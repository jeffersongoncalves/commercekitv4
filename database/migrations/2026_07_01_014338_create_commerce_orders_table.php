<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('display_id')->nullable();
            $table->string('region_id')->nullable()->index();
            $table->string('customer_id')->nullable()->index();
            $table->string('sales_channel_id')->nullable()->index();
            $table->string('email')->nullable();
            $table->string('currency_code');
            $table->string('status')->default('pending');
            $table->json('shipping_address')->nullable();
            $table->json('billing_address')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_orders');
    }
};
