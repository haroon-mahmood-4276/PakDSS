<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_social_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('account_id');
            $table->foreignUuid('user_id')->nullable()->constrained();
            $table->string('name')->nullable();
            $table->longText('token')->nullable();
            $table->longText('refreshToken')->nullable();
            $table->unsignedInteger('expiresIn')->default(0);
            $table->json('approved_scopes')->default(json_encode([]));

            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_social_accounts');
    }
};
