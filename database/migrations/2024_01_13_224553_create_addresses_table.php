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
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('user_id')->constrained();
            $table->enum('address_type', ['home', 'office']);
            $table->foreignUuid('country_id')->constrained();
            $table->foreignUuid('state_id')->constrained();
            $table->foreignUuid('city_id')->constrained();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('nearest_landmark')->nullable();
            $table->integer('zip_code')->default(0);
            $table->boolean('default_delivery_address')->default(false);
            $table->boolean('default_billing_address')->default(false);

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
        Schema::dropIfExists('addresses');
    }
};
