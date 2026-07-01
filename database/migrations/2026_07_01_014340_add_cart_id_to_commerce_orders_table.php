<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('commerce_orders', function (Blueprint $table) {
            $table->string('cart_id')->nullable()->index()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('commerce_orders', function (Blueprint $table) {
            $table->dropColumn('cart_id');
        });
    }
};
