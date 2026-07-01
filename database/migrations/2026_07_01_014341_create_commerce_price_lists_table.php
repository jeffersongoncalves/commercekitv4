<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_price_lists', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status')->default('draft');
            $table->string('type')->default('sale');
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_price_lists');
    }
};
