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
        Schema::create('shipping_self_pickup_locations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('country_id')->constrained();
            $table->foreignUuid('state_id')->constrained();
            $table->foreignUuid('city_id')->constrained();
            $table->string('name');
            $table->text('address');
            $table->integer('zip_code')->default(0);
            $table->text('pickup_details')->nullable();

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
        Schema::dropIfExists('shipping_self_pickup_locations');
    }
};
