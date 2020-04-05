<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dispatchno')->unique();
            $table->integer('orderNo');
            $table->string('customerName')->nullable($value = false);
            $table->string('courierName')->nullable($value = false);
            $table->string('truckNo')->nullable($value = false);
            $table->string('from')->nullable($value = false);
            $table->string('to')->nullable($value = false);
            $table->string('pickup')->nullable($value = false);
            $table->string('amount');
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
        Schema::dropIfExists('dispatches');
    }
}
