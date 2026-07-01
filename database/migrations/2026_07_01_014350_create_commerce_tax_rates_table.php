<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_tax_rates', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('tax_region_id')->index();
            $table->float('rate')->nullable();
            $table->string('code')->nullable();
            $table->string('name');
            $table->boolean('is_default')->default(false);
            $table->boolean('is_combinable')->default(false);
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_tax_rates');
    }
};
