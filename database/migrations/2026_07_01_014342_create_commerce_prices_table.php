<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_prices', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title')->nullable();
            $table->integer('amount');
            $table->string('currency_code');
            $table->string('price_set_id')->index();
            $table->string('price_list_id')->nullable()->index();
            $table->integer('min_quantity')->nullable();
            $table->integer('max_quantity')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_prices');
    }
};
