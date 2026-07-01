<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_payments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('payment_collection_id')->index();
            $table->integer('amount');
            $table->string('currency_code');
            $table->string('provider_id');
            $table->timestamp('captured_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_payments');
    }
};
