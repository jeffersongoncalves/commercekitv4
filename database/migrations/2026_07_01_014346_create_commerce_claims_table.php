<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_claims', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('order_id')->index();
            $table->string('type')->default('refund');
            $table->string('status')->default('open');
            $table->integer('refund_amount')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_claims');
    }
};
