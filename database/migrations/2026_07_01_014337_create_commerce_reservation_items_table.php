<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_reservation_items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('inventory_item_id')->index();
            $table->string('location_id')->index();
            $table->integer('quantity');
            $table->string('line_item_id')->nullable()->index();
            $table->string('description')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_reservation_items');
    }
};
