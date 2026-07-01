<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_payment_sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('payment_collection_id')->index();
            $table->integer('amount');
            $table->string('currency_code');
            $table->string('provider_id');
            $table->string('status')->default('pending');
            $table->json('data')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_payment_sessions');
    }
};
