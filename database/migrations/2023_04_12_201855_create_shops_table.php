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
        Schema::create('shops', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('seller_id');

            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();

            $table->string('email')->unique()->nullable();

            $table->string('phone_1')->unique()->nullable();
            $table->string('phone_2')->unique()->nullable();

            $table->text('address')->nullable();
            $table->text('pickup_address')->nullable();
            $table->text('description')->nullable();

            $table->string('manager_name')->nullable();
            $table->string('manager_mobile')->unique()->nullable();
            $table->string('manager_email')->unique()->nullable();

            $table->string('lat')->nullable();
            $table->string('long')->nullable();

            $table->string('status')->nullable();
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
        Schema::dropIfExists('shops');
    }
};
