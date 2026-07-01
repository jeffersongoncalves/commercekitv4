<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_exchange_items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('exchange_id')->index();
            $table->string('type')->default('inbound');
            $table->string('order_line_item_id')->nullable()->index();
            $table->string('variant_id')->nullable()->index();
            $table->integer('quantity');
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_exchange_items');
    }
};
