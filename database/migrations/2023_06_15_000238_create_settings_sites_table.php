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
        Schema::create('settings_sites', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('tab_id')->default('default');
            $table->string('text')->nullable();
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->string('rules')->nullable();

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
        Schema::dropIfExists('settings_sites');
    }
};
