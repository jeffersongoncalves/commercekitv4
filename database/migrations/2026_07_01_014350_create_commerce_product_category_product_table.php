<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_product_category_product', function (Blueprint $table) {
            $table->string('product_id')->index();
            $table->string('product_category_id')->index();
            $table->primary(['product_id', 'product_category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_product_category_product');
    }
};
