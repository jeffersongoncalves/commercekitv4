<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_tax_regions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('country_code');
            $table->string('province_code')->nullable();
            $table->string('parent_id')->nullable()->index();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_tax_regions');
    }
};
