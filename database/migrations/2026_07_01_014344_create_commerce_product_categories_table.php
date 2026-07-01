<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_product_categories', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('handle')->unique();
            $table->text('description')->nullable();
            $table->string('parent_category_id')->nullable()->index();
            $table->string('mpath')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_internal')->default(false);
            $table->integer('rank')->default(0);
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_product_categories');
    }
};
