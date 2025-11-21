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
            CREATE OR REPLACE FUNCTION fn_get_profile_data(in_id INT DEFAULT NULL)
            RETURNS JSON
            LANGUAGE plpgsql AS \$function$
            BEGIN
                RETURN (
                    SELECT json_agg(u)
                    FROM (
                    WITH get_user_id AS (
                        SELECT id user_id FROM users WHERE id = COALESCE(in_id, id)
                    ), get_profile AS (
                    SELECT  b.user_id,
                            a.id profile_id,
                            a.first_name,
                            a.last_name,
                            a.work_email,
                            a.phone_number,
                            a.date_of_birth,
                            a.address, a.city,
                            a.country,
                            a.profile_desc,
                            a.profile_img
                      FROM jsk_profiles a
                     INNER JOIN get_user_id b
                        ON a.user_id = b.user_id
                    ), get_skill AS (
                    SELECT json_agg(json_build_object(
                                'skill_id', b.id,
                                'skill_name', b.skill_name
                           )) as data,
                           c.profile_id
                      FROM jsk_dc_profile_skill a
                     LEFT JOIN jsk_skills b
                        ON a.skill_id = b.id
                     LEFT JOIN get_profile c
                        ON a.profile_id = c.profile_id
                     GROUP BY c.profile_id
                     ), get_exp AS ( -- Nigger
                    SELECT json_agg(json_build_object(
								'experience_id', a.id,
                                'job_title', a.job_title,
                                'company_name', a.company_name,
                                'company_address', a.company_address,
                                'description', a.description,
                                'start_date', a.start_date,
                                'end_date', a.end_date
                            )) as data,
                            b.profile_id
                      FROM jsk_profile_experience a
                     INNER JOIN get_profile b
                        ON a.profile_id = b.profile_id
                     GROUP BY b.profile_id
                    ), get_edu AS (
                    SELECT json_agg(json_build_object(
								'education_id', a.id,
                                'institution_name', a.institution_name,
                                'degree', a.degree,
                                'field_of_study', a.fos,
                                'description', a.description,
                                'start_date', a.start_date,
                                'end_date', a.end_date
                            )) as data,
                           b.profile_id
                      FROM jsk_profile_education a
                     INNER JOIN get_profile b
                        ON a.profile_id = b.profile_id
                     GROUP BY b.profile_id
                    ), get_cert AS (
                    SELECT json_agg(json_build_object(
								'certificate_id', a.id,
                                'certificate_title', a.certificate_title,
                                'issued_org', a.issued_org,
                                'issued_date', a.issued_date,
                                'description', a.description
                            )) as data,
                           b.profile_id
                      FROM jsk_profile_certificate a
                     INNER JOIN get_profile b
                        ON a.profile_id = b.profile_id
                     GROUP BY b.profile_id
                    ), final_data AS (
                    SELECT a.data experience,
                           b.data education,
                           c.data certificate,
                           d.data skill,
                           x.profile_id
					  FROM get_profile x
                      LEFT JOIN get_exp a
					    ON x.profile_id = a.profile_id
                      LEFT JOIN get_edu b
                        ON x.profile_id = b.profile_id
                      LEFT JOIN get_cert c
                        ON x.profile_id = c.profile_id
                      LEFT JOIN get_skill d
                        ON x.profile_id = d.profile_id
                    ) SELECT a.*,
                             b.skill,
                             b.experience,
                             b.education,
                             b.certificate
                        FROM get_profile a
                        LEFT JOIN final_data b
                          ON a.profile_id = b.profile_id) u
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
        Schema::dropIfExists('fn_get_profile_data');
    }
};