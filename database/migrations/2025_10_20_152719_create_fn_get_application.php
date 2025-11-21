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
            CREATE OR REPLACE FUNCTION fn_get_application(in_id INT DEFAULT NULL, in_status VARCHAR DEFAULT NULL)
            RETURNS JSON
            LANGUAGE plpgsql AS \$function$
            BEGIN
                RETURN (
                        SELECT json_agg(u)
                        FROM (select a.id application_id,
                            application_date,
                            b.job_title apply_for,
                            c.company_name,
                            b.job_type,
                            b.work_mode,
                            case
                                when application_status = 'P' THEN 'Pending'
                                when application_status = 'C' THEN 'Closed'
                                when application_status = 'S' THEN 'Shortlisted'
                                when application_status = 'R' THEN 'Rejected'
                            end as application_status,
                            case
                                when application_type = 'CV_UPL' THEN 'CV Apply'
                                when application_type = 'EZ_APY' THEN 'Easy Apply'
                            end as apply_method,
                            coalesce(a.cv_path, 'Not Available') cv,
                            cover_letter
                        from job_applications a
                        inner join job_postings b
                            on a.job_posting_id = b.id
                        inner join emp_profiles c
                            on b.maker_id = c.user_id
                        where applicant_id = coalesce(in_id, applicant_id)
                        and application_status = coalesce(in_status, application_status)) u
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
        Schema::dropIfExists('fn_get_application');
    }
};