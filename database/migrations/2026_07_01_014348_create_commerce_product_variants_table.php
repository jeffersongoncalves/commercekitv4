<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_product_variants', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('sku')->nullable()->unique();
            $table->string('barcode')->nullable();
            $table->string('ean')->nullable();
            $table->string('upc')->nullable();
            $table->boolean('manage_inventory')->default(true);
            $table->boolean('allow_backorder')->default(false);
            $table->float('weight')->nullable();
            $table->integer('variant_rank')->default(0);
            $table->string('product_id')->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_product_variants');
    }
};
