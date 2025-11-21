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
        Schema::create('jsk_skills', function (Blueprint $table) {
            $table->id();
            $table->string('skill_code');
            $table->string('skill_name');
            $table->text('skill_desc')->nullable();

            $table->unsignedBigInteger('skill_category')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->foreign('skill_category')->references('id')->on('gen_industry')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jsk_skills');
    }
};
