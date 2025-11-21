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
            CREATE OR REPLACE FUNCTION fn_get_emp_profile_data(in_id INT DEFAULT NULL)
            RETURNS JSON
            LANGUAGE plpgsql AS \$function$
            BEGIN
                RETURN (
                    SELECT json_agg(u)
                    FROM (
                        WITH get_user AS (
                        select id from users where id = COALESCE(in_id, id)
                    ), get_profile AS (
                        select a.id profile_id,
                            a.company_name,
                            a.company_size,
                            a.industry,
                            a.hq_address,
                            a.description,
                            a.company_img
                        from emp_profiles a
                        inner join get_user b
                            on a.user_id = b.id
                    ), get_biz_ver AS (
                        select json_agg(json_build_object (
                                    'biz_reg_no', a.biz_reg_no,
                                    'biz_license_img', a.biz_license_img
                            )) business_license,
                            a.profile_id
                        from emp_biz_verifications a
                        inner join get_profile b
                            on a.profile_id = b.profile_id
                        group by a.profile_id
                    ), get_acc_rep AS (
                        select json_agg(json_build_object(
                                    'full_name', a.full_name,
                                    'job_title', a.job_title,
                                    'email', a.email,
                                    'phone_number', a.phone_number
                                )) representative,
                                a.profile_id
                        from emp_account_representatives a
                        inner join get_profile b
                            on a.profile_id = b.profile_id
                        group by a.profile_id
                    ) select *
                        from get_profile a
                        left join get_biz_ver b
                        on a.profile_id = b.profile_id
                        left join get_acc_rep c
                        on a.profile_id = c.profile_id
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
        Schema::dropIfExists('fn_get_emp_profile_data');
    }
};
