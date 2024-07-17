<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('shop_id');

            $table->string('name', 150)->nullable();

            $table->string('permalink', 200)->nullable()->unique();
            $table->string('model_no', 50)->nullable()->unique();

            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('discounted_price', 8, 2)->default(0);

            $table->boolean('call_for_final_rates')->default(false);
            $table->boolean('are_rates_printed_on_package')->default(false);

            $table->decimal('length', 8, 2)->default(0);
            $table->decimal('width', 8, 2)->default(0);
            $table->decimal('height', 8, 2)->default(0);

            $table->decimal('weight', 8, 2)->default(0);

            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();

            $table->string('meta_author', 50)->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->string('status')->nullable();
            $table->string('reason')->nullable();

            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
