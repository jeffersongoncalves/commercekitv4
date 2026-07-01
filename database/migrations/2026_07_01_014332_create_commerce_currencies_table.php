<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_currencies', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('symbol');
            $table->string('symbol_native');
            $table->string('name');
            $table->unsignedTinyInteger('decimal_digits')->default(2);
            $table->float('rounding')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_currencies');
    }
};
