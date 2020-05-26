<?php

use App\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->text('address');
            $table->unsignedInteger('total');
            $table->unsignedTinyInteger('status')->default(Order::PENDING_PAYMENT);
            $table->timestamps();

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
