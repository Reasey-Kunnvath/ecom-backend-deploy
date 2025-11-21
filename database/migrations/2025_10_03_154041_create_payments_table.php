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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_invoice_id')->unique()->nullable();
            $table->string('stripe_subscription_id')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('payment_type')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3);
            $table->string('status');
            $table->json('metadata')->nullable();
            $table->string('idempotency_key')->unique();
            $table->string('stripe_checkout_session_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};