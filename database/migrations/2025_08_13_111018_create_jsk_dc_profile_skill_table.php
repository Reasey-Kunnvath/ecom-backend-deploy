<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jsk_dc_profile_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('skill_id');

            $table->foreign('profile_id')->references('id')->on('jsk_profiles')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('jsk_skills')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jsk_dc_profile_skill');
    }
};
