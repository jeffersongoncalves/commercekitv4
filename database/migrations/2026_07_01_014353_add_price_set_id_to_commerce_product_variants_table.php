<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('commerce_product_variants', function (Blueprint $table) {
            $table->string('price_set_id')->nullable()->index()->after('product_id');
        });
    }

    public function down(): void
    {
        Schema::table('commerce_product_variants', function (Blueprint $table) {
            $table->dropColumn('price_set_id');
        });
    }
};
