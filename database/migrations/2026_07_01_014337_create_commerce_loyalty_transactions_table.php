<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_loyalty_transactions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('loyalty_account_id')->index();
            $table->integer('points');
            $table->string('type');
            $table->string('reference')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_loyalty_transactions');
    }
};
