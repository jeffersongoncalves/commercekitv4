<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_product_variant_option_value', function (Blueprint $table) {
            $table->string('variant_id')->index();
            $table->string('option_value_id')->index();
            $table->primary(['variant_id', 'option_value_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_product_variant_option_value');
    }
};
