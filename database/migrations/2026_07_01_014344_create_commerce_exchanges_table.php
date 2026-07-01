<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_exchanges', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('order_id')->index();
            $table->string('status')->default('requested');
            $table->integer('difference_amount')->nullable();
            $table->string('location_id')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_exchanges');
    }
};
