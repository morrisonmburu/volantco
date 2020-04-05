<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('to');
            $table->string('from');
            $table->string('package');
            $table->string('price');
            $table->string('time');
            // $table->string('countdown')->nullable();
            $table->string('payment_type');
            $table->integer('mark')->nullable();
            $table->integer('cancel')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('user_id');
            $table->string('instructions')->nullable();
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
