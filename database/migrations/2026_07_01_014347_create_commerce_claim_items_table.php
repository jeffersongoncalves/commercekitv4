<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_claim_items', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('claim_id')->index();
            $table->string('order_line_item_id')->index();
            $table->integer('quantity');
            $table->string('reason')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_claim_items');
    }
};
