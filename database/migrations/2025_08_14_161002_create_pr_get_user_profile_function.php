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
        // DB::unprepared('
        //     CREATE OR REPLACE FUNCTION fn_get_user_profile(user_id INT)
        //     RETURNS TABLE (
        //         user_id INT,
        //         full_name TEXT,

        //     )

        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pr_get_user_profile_function');
    }
};
