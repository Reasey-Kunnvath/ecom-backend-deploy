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
            CREATE OR REPLACE FUNCTION fn_get_job_application(in_maker_id INT DEFAULT NULL, in_job_id INT DEFAULT NULL, in_sts VARCHAR DEFAULT NULL)
            RETURNS JSON
            LANGUAGE plpgsql AS \$function$
            BEGIN
                RETURN (
                        WITH get_job_app AS (
                            select a.id application_id,
                                application_date,
                                b.job_title apply_for,
                                b.job_type,
                                b.work_mode,
                                case
                                    when application_status = 'P' THEN 'Pending'
                                    when application_status = 'C' THEN 'Closed'
                                    when application_status = 'S' THEN 'Shortlisted'
                                    when application_status = 'R' THEN 'Rejected'
                                end as application_status,
                                case
                                    when application_status = 'R' OR application_status = 'C' THEN reason
                                end as reason,
                                case
                                    when application_type = 'CV_UPL' THEN 'CV Upload'
                                    when application_type = 'EZ_APY' THEN 'Easy Apply'
                                end as apply_method,
                                a.cover_letter,
                                a.cv_path cv,
                                fn_get_profile_data(c.user_id::int) applicant_detail
                         from job_applications a
                        inner join job_postings b
                           on a.job_posting_id = b.id
                        inner join jsk_profiles c
                           on a.applicant_id = c.user_id
                        where a.application_status = COALESCE(in_sts, a.application_status)
                          and a.job_posting_id = COALESCE(in_job_id, a.job_posting_id)
                          and b.maker_id = COALESCE(in_maker_id, a.job_posting_id)
                        ) select json_agg(u) from get_job_app u
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
        DB::unprepared("DROP FUNCTION IF EXISTS fn_get_job_application(IN in_maker_id INT, IN in_job_id INT, IN in_sts VARCHAR);");
    }
};
