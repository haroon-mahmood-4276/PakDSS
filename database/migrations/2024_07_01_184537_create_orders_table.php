<?php

use App\Utils\Enums\{OrderStatuses, PaymentMethods, PaymentStatuses};
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_number')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shipping_address_id');
            $table->unsignedBigInteger('billing_address_id');
            $table->enum('order_status', OrderStatuses::values())->default(OrderStatuses::PENDING);
            $table->enum('payment_method', PaymentMethods::values())->nullable();
            $table->enum('payment_status', PaymentStatuses::values())->default(PaymentStatuses::PENDING);

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
        Schema::dropIfExists('orders');
    }
};
