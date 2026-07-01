<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commerce_provider_identities', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('entity_id');
            $table->string('provider');
            $table->string('auth_identity_id')->index();
            $table->json('user_metadata')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['provider', 'entity_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commerce_provider_identities');
    }
};
