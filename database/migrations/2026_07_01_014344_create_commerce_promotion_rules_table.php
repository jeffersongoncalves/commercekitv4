<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_promotion_rules', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('promotion_id')->index();
            $table->string('attribute');
            $table->string('operator')->default('eq');
            $table->string('value');
            $table->string('description')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_promotion_rules');
    }
};
