<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_shipping_options', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('service_zone_id')->index();
            $table->string('shipping_profile_id')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('price_type')->default('flat');
            $table->json('data')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_shipping_options');
    }
};
