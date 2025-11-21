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
            CREATE OR REPLACE FUNCTION fn_check_job_expiry()
            RETURNS TRIGGER AS $$
            BEGIN
                IF NEW.posted_date > NEW.expire_date THEN
                    NEW.is_active := FALSE;
                END IF;
                RETURN NEW;
            END;
            $$ LANGUAGE plpgsql;
        ");


        DB::unprepared("
            CREATE TRIGGER trg_check_job_expiry
            BEFORE INSERT OR UPDATE ON job_postings
            FOR EACH ROW
            EXECUTE FUNCTION fn_check_job_expiry();
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trg_disable_job');
    }
};