<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('handle')->unique();
            $table->text('description')->nullable();
            $table->string('status')->default('draft');
            $table->string('thumbnail')->nullable();
            $table->float('weight')->nullable();
            $table->float('length')->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('mid_code')->nullable();
            $table->string('material')->nullable();
            $table->boolean('is_giftcard')->default(false);
            $table->boolean('discountable')->default(true);
            $table->string('collection_id')->nullable()->index();
            $table->string('type_id')->nullable()->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_products');
    }
};
