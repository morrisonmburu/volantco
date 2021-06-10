<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("payment_type_id");
            $table->double("total", 12, 2);
            $table->double("paid_amount", 12, 2)->default(0.00);
            $table->double("balance", 12, 2)->default(0.00);
            $table->double("extra", 12, 2)->default(0.00);
            $table->integer("user_id");
            $table->integer("status")->default(0);
            $table->bigInteger("timestamp");
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
        Schema::dropIfExists('order_payments');
    }
}
