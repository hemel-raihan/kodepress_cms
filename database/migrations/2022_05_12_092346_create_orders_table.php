<?php

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
            $table->integer('order_code')->nullable();
            $table->foreignId('address_id');
            $table->foreignId('price_id');
            $table->string('delivery_status')->default('pending');
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->default('unpaid');
            $table->longText('payment_details')->nullable();
            $table->double('grand_total',20,2)->nullable();
            $table->double('coupon_discount')->default(0.00);
            $table->mediumText('code')->nullable();
            $table->timestamps();
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
