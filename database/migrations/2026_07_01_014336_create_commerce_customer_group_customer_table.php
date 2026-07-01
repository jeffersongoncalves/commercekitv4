<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_customer_group_customer', function (Blueprint $table) {
            $table->string('customer_id')->index();
            $table->string('customer_group_id')->index();
            $table->primary(['customer_id', 'customer_group_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_customer_group_customer');
    }
};
