<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_application_methods', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('promotion_id')->index();
            $table->string('type')->default('percentage');
            $table->string('target_type')->default('items');
            $table->string('allocation')->nullable();
            $table->integer('value');
            $table->string('currency_code')->nullable();
            $table->integer('max_quantity')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_application_methods');
    }
};
