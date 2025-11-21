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
        Schema::create('jsk_profile_certificate', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_title');
            $table->string('issued_org');
            $table->date('issued_date')->nullable();
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
        Schema::dropIfExists('jsk_profile_certificate');
    }
};