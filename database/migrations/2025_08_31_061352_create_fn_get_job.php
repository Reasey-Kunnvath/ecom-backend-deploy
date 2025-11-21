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
            CREATE OR REPLACE FUNCTION fn_get_job(in_id INT DEFAULT NULL, in_active BOOLEAN DEFAULT TRUE)
            RETURNS JSON
            LANGUAGE plpgsql AS \$function$
            BEGIN
                RETURN (
                        SELECT json_agg(u)
                        FROM (
                            WITH get_job_skill AS (
                                SELECT json_agg(json_build_object(
                                            'skill_id', COALESCE(b.skill_id, 0),
                                            'skill_name', COALESCE(c.skill_name, 'N/A')
                                    )) req_skills,
                                    a.id job_id
                                FROM job_postings a
                                LEFT JOIN DC_JOB_SKILLS b ON a.id = b.job_id
                                LEFT JOIN jsk_skills c ON b.skill_id = c.id
                                WHERE a.id = COALESCE(in_id, a.id)
                                AND a.is_active = COALESCE(in_active, a.is_active)
                                GROUP BY a.id
                            ),
                            get_job_dtl AS (
                                SELECT a.id job_id,
                                    a.job_title,
                                    a.job_desc,
                                    json_agg(a.responsibilities) responsibilities,
                                    json_agg(json_build_object(
                                        'experience',a.req_experience,
                                        'education',a.req_education,
                                        'certificate',a.req_certificate,
                                        'skills',b.req_skills
                                    )) AS qualification,
                                    a.job_type,
                                    a.work_mode,
                                    CASE
                                        WHEN a.min_salary = 0 AND a.max_salary = 0 THEN
                                                'Negotiable'
                                        WHEN a.min_salary = 0 THEN
                                                ROUND(a.max_salary)::text
                                        WHEN a.max_salary = 0 THEN
                                                ROUND(a.min_salary)::text
                                        ELSE
                                                CONCAT(ROUND(a.min_salary), ' ', a.ccy, ' To ', ROUND(a.max_salary), ' ', a.ccy)
                                    END AS Salary,
                                    a.job_location,
                                    a.posted_date,
                                    a.expire_date,
                                    fn_get_emp_profile_data(a.maker_id::int) AS maker_detail
                                FROM job_postings a
                                INNER JOIN get_job_skill b
                                    ON a.id = b.job_id
                                GROUP BY a.id,
                                        a.job_title,
                                        a.job_desc,
                                        a.job_type,
                                        a.work_mode,
                                        a.job_location,
                                        a.posted_date,
                                        a.expire_date
                            )
                            SELECT * FROM get_job_dtl
                        ) u
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
        Schema::dropIfExists('fn_get_job');
    }
};
