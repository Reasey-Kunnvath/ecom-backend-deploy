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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('job_desc');
            $table->jsonb('responsibilities')->nullable();
            $table->jsonb('req_experience');
            $table->jsonb('req_education')->nullable();
            $table->jsonb('req_certificate')->nullable();
            $table->string('job_type');
            $table->string('work_mode');
            $table->decimal('min_salary', 8, 2)->nullable();
            $table->decimal('max_salary', 8, 2)->nullable();
            $table->string('ccy');
            $table->string('job_location');
            $table->boolean('is_active')->default(true);
            $table->date('posted_date')->nullable();
            $table->date('expire_date')->nullable();

            $table->unsignedBigInteger('maker_id');
            $table->foreign('maker_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};
