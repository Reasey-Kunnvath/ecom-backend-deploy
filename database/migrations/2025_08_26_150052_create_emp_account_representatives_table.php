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
        Schema::create('emp_account_representatives', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('job_title');
            $table->string('email')->unique();
            $table->string('phone_number');

            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('emp_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp_account_representatives');
    }
};