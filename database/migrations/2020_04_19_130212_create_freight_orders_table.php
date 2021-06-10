<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_orders', function (Blueprint $table) {
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
            $table->string('truck_category')->nullable();
            $table->text('stopoverlocation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freight_orders');
    }
}
