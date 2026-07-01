<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_store_credit_transactions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('store_credit_account_id')->index();
            $table->integer('amount');
            $table->string('reference')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_store_credit_transactions');
    }
};
