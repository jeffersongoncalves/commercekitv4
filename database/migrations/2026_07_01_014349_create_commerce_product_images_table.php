<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_product_images', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('url');
            $table->integer('rank')->default(0);
            $table->string('product_id')->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_product_images');
    }
};
