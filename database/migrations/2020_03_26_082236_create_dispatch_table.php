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
            $table->uuid('dispatchno')->unique();
            $table->integer('orderNo');
            $table->integer('driverNo');
            $table->string('customerName')->nullable($value = false);
            $table->string('DriverName')->nullable($value = false);
            $table->string('DriverPhone')->nullable($value = false);
            $table->string('plateNumber')->nullable($value = false);
            $table->string('from')->nullable($value = false);
            $table->string('to')->nullable($value = false);
            $table->string('package')->nullable($value = false);
            $table->integer('status')->default(0);
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
