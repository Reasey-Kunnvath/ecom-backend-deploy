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
        Schema::create('stripe_pricing', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->unique();
            $table->string('product_name');
            $table->string('price_id')->unique();
            $table->float('amount');
            $table->string('currency');
            $table->string('maker_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stripe_pricing');
    }
};
