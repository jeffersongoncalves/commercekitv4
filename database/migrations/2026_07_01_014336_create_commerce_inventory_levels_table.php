<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_inventory_levels', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('inventory_item_id')->index();
            $table->string('location_id')->index();
            $table->integer('stocked_quantity')->default(0);
            $table->integer('reserved_quantity')->default(0);
            $table->integer('incoming_quantity')->default(0);
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['inventory_item_id', 'location_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_inventory_levels');
    }
};
