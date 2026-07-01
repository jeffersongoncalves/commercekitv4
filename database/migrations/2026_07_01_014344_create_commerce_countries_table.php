<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_countries', function (Blueprint $table) {
            $table->string('iso_2')->primary();
            $table->string('iso_3');
            $table->string('num_code');
            $table->string('name');
            $table->string('display_name');
            $table->string('region_id')->nullable()->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_countries');
    }
};
