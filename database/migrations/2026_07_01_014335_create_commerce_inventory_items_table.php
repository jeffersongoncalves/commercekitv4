<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_inventory_items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('sku')->nullable()->unique();
            $table->string('title')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('mid_code')->nullable();
            $table->string('material')->nullable();
            $table->float('weight')->nullable();
            $table->boolean('requires_shipping')->default(true);
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_inventory_items');
    }
};
