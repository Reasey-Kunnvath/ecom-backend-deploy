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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_code');
            $table->string('plan_name');
            $table->decimal('plan_price', 8, 2);
            $table->text('plan_description')->nullable();
            $table->integer('plan_duration');
            $table->integer('max_post');
            $table->boolean('is_active')->default(true);
            $table->jsonb('plan_features')->nullable();
            $table->string('stripe_price_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subccription_plan');
    }
};