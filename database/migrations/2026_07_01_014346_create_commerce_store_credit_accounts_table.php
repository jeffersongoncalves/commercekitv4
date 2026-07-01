<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_store_credit_accounts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('customer_id')->index();
            $table->string('currency_code');
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_store_credit_accounts');
    }
};
