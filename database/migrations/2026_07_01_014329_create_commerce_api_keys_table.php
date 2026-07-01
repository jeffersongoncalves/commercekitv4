<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_api_keys', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('token')->unique();
            $table->string('redacted');
            $table->string('title');
            $table->string('type')->default('publishable');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('revoked_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_api_keys');
    }
};
