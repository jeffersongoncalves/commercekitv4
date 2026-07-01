<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_promotions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('code')->unique();
            $table->boolean('is_automatic')->default(false);
            $table->string('type')->default('standard');
            $table->string('status')->default('draft');
            $table->string('campaign_id')->nullable()->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_promotions');
    }
};
