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
        Schema::create('jsk_profile_education', function (Blueprint $table) {
            $table->id();
            $table->string('institution_name');
            $table->string('degree');
            $table->string('fos');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description')->nullable();

            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('jsk_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jsk_profile_education');
    }
};
