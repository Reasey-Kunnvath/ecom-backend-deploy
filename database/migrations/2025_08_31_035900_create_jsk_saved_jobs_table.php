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
        Schema::create('jsk_saved_jobs', function (Blueprint $table) {
            $table->id();
            $table->date('saved_date');

            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('jsk_user_id');

            $table->foreign('job_id')->references('id')->on('job_postings')->onDelete('cascade');
            $table->foreign('jsk_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jsk_saved_jobs');
    }
};
