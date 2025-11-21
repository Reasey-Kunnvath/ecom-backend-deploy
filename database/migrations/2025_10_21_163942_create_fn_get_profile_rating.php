<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("
            CREATE OR REPLACE FUNCTION fn_get_profile_rating(in_id INT)
            RETURNS JSON
            LANGUAGE plpgsql AS \$function$
            DECLARE
                v_profiles JSON;
                v_profile JSON;
                v_skills_count INT := 0;
                v_experience_count INT := 0;
                v_bio_length INT := 0;
                v_has_education BOOLEAN := FALSE;
                v_has_photo BOOLEAN := FALSE;
                v_has_contact BOOLEAN := FALSE;
                v_has_name BOOLEAN := FALSE;
                v_is_eligible BOOLEAN := TRUE;
                -- Subscores
                v_skills_score NUMERIC := 0;
                v_experience_score NUMERIC := 0;
                v_bio_score NUMERIC := 0;
                v_education_score NUMERIC := 0;
                v_completeness_score NUMERIC := 0;
                v_total_score NUMERIC := 0;

                v_recommendations TEXT[];
            BEGIN
                -- Get profile Data
                SELECT fn_get_profile_data(in_id) INTO v_profiles;
                v_profile := (v_profiles->0);  -- first object in array

                IF v_profile IS NULL THEN
                    RETURN json_build_object('error', 'Profile not found');
                END IF;

                -- Extract Key
                v_skills_count := COALESCE(json_array_length(v_profile->'skill'), 0);
                v_experience_count := COALESCE(json_array_length(v_profile->'experience'), 0);
                v_bio_length := length(COALESCE(v_profile->>'profile_desc', ''));
                v_has_education := COALESCE(json_array_length(v_profile->'education'), 0) > 0;
                v_has_photo := (v_profile->>'profile_img') IS NOT NULL AND v_profile->>'profile_img' <> 'null';
                v_has_contact := (v_profile->>'phone_number') IS NOT NULL AND (v_profile->>'work_email') IS NOT NULL;
                v_has_name := (v_profile->>'first_name') IS NOT NULL AND (v_profile->>'last_name') IS NOT NULL;

                -- sub-scores (0–100 scale)
                v_skills_score := CASE WHEN v_skills_count = 0 THEN 0 WHEN v_skills_count < 3 THEN 50 ELSE 100 END; -- LEAST(v_skills_count * 12, 100);
                v_experience_score := CASE WHEN v_experience_count = 0 THEN 0 ELSE 100 END;
                v_bio_score := CASE WHEN v_bio_length > 75 THEN 40 WHEN v_bio_length > 150 THEN 60 WHEN v_bio_length > 250 THEN 80 ELSE 100 END;
                v_education_score := CASE WHEN v_has_education THEN 100 ELSE 0 END;
                v_completeness_score := (CASE
                                            WHEN v_has_name AND v_has_contact AND v_has_photo THEN 100
                                            WHEN v_has_name AND v_has_contact THEN 65
                                            ELSE 0
                                        END);
                -- Weighted total
                v_total_score :=
                    v_skills_score * 0.1 +
                    v_experience_score * 0.1 +
                    v_bio_score * 0.1 +
                    v_education_score * 0.1 +
                    v_completeness_score * 0.6;

                -- Generate recommendations
                IF v_skills_count < 3 THEN
                    v_recommendations := array_append(v_recommendations, 'Add more relevant skills to strengthen your profile.');
                END IF;
                IF v_experience_count = 0 THEN
                    v_recommendations := array_append(v_recommendations, 'Include at least one past work experience. Having work experience will gain you an advantage in landing a job interview');
                END IF;
                IF v_bio_length < 50 THEN
                    v_recommendations := array_append(v_recommendations, 'Expand your profile summary to describe your strengths and goals. Generally a great bio has 250+ words');
                END IF;
                IF NOT v_has_photo THEN
                    v_recommendations := array_append(v_recommendations, 'A professional profile photo can have a huge impact on your job Application!');
                    v_is_eligible := FALSE;
                END IF;
                IF NOT v_has_education THEN
                    v_recommendations := array_append(v_recommendations, 'Add your education background. It shows how your skills were build brick by brick!');
                END IF;
                IF NOT v_has_contact THEN
                    v_recommendations := array_append(v_recommendations, 'Your Phone Number and Work Email is the most important part of your profile! Please add them.');
                    v_is_eligible := FALSE;
                END IF;
                IF NOT v_has_name THEN
                    v_recommendations := array_append(v_recommendations, 'Please add your First Name and Last Name. No one wants to hire an unknown.');
                    v_is_eligible := FALSE;
                END IF;

                -- Return final JSON
                RETURN json_build_object(
                    'ez_apply_eligibility', v_is_eligible,
                    'overall_score', ROUND(v_total_score),
                    'breakdown', json_build_object(
                        'skills', ROUND(v_skills_score * 0.1),
                        'experience', ROUND(v_experience_score * 0.1),
                        'bio', ROUND(v_bio_score * 0.1),
                        'education', ROUND(v_education_score * 0.1),
                        'completeness', ROUND(v_completeness_score * 0.6)
                    ),
                    'recommendations', v_recommendations
                );
            END;
            \$function$;

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fn_get_profile_rating');
    }
};
