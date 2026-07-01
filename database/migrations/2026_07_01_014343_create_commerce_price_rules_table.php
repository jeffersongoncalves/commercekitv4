<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_price_rules', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('price_id')->index();
            $table->string('attribute');
            $table->string('operator')->default('eq');
            $table->string('value');
            $table->integer('priority')->default(0);
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_price_rules');
    }
};
