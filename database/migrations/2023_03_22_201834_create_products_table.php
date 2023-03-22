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
            $table->string('name', 150)->nullable();
            $table->string('permalink', 200)->nullable()->unique();
            $table->string('product_sku', 50)->nullable()->unique();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->text('product_keywords')->nullable();
            $table->string('meta_aurthor', 50)->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
