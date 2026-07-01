<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_refunds', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('payment_id')->index();
            $table->integer('amount');
            $table->string('reason')->nullable();
            $table->string('note')->nullable();
            $table->string('created_by')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_refunds');
    }
};
