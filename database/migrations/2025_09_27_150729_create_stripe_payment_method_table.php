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
        Schema::create('stripe_payment_method', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stripe_customer_id');
            $table->string('stripe_payment_method_id')->unique();
            $table->string('card_type');
            $table->string('last4');
            $table->unsignedTinyInteger('exp_month');
            $table->unsignedSmallInteger('exp_year');
            $table->string('billing_name')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_address2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip')->nullable();
            $table->string('billing_country')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();

            $table->foreign('stripe_customer_id')->references('id')->on('stripe_customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe_payment_method');
    }
};
