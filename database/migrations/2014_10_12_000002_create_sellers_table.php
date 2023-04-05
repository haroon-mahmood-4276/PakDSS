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
        Schema::create('sellers', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->integer('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cnic')->nullable();
            $table->string('ntn_number')->nullable();
            $table->string('phone_primary')->nullable();
            $table->string('phone_secondary')->nullable();
            $table->rememberToken();
            $table->string('status')->default('inactive');
            $table->string('reason')->nullable();

            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
