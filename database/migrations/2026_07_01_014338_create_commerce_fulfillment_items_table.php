<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_fulfillment_items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('fulfillment_id')->index();
            $table->string('title');
            $table->integer('quantity');
            $table->string('line_item_id')->nullable()->index();
            $table->string('inventory_item_id')->nullable()->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_fulfillment_items');
    }
};
