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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id(); # application ID
            $table->date('application_date');
            $table->string('application_status')->default('P'); # P = Pending, S = Shortlisted, R = Rejected, C = Cancelled
            $table->unsignedBigInteger('job_posting_id'); # JOB ID
            $table->unsignedBigInteger('applicant_id'); # user ID of the applicant
            $table->string('application_type'); # EZ_APY = Easy Apply, CV_UPL = CV Upload
            $table->string('cv_path')->nullable();
            $table->text('cover_letter')->nullable();
            $table->text('reason')->nullable();
            $table->foreign('job_posting_id')->references('id')->on('job_postings')->onDelete('cascade');
            $table->foreign('applicant_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications_ez_apl');
    }
};
