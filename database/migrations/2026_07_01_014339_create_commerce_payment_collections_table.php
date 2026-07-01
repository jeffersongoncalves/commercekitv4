<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_payment_collections', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('amount');
            $table->string('currency_code');
            $table->string('status')->default('not_paid');
            $table->integer('authorized_amount')->nullable();
            $table->integer('captured_amount')->default(0);
            $table->integer('refunded_amount')->default(0);
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_payment_collections');
    }
};
