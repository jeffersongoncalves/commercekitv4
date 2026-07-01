<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_translations', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('translatable_type');
            $table->string('translatable_id');
            $table->string('locale');
            $table->string('field');
            $table->text('value')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['translatable_type', 'translatable_id']);
            $table->unique(['translatable_type', 'translatable_id', 'locale', 'field'], 'commerce_translation_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_translations');
    }
};
