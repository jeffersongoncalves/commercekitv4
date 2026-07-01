<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_cart_line_items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('cart_id')->index();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->string('product_id')->nullable()->index();
            $table->string('variant_id')->nullable()->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_cart_line_items');
    }
};
