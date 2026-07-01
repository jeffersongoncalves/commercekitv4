<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_campaigns', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('campaign_identifier')->unique();
            $table->text('description')->nullable();
            $table->integer('budget_limit')->nullable();
            $table->string('budget_currency_code')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_campaigns');
    }
};
