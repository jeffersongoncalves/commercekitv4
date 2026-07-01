<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_cart_shipping_methods', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('cart_id')->index();
            $table->string('name');
            $table->integer('amount');
            $table->string('shipping_option_id')->nullable();
            $table->json('data')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_cart_shipping_methods');
    }
};
