<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolantPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volant_pricings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('light_price')->nullable();
            $table->integer('light_unit_distance')->nullable();
            $table->integer('light_unit_additional_price')->nullable();
            $table->integer('medium_price')->nullable();
            $table->integer('medium_unit_distance')->nullable();
            $table->integer('medium_unit_additional_price')->nullable();
            $table->integer('heavy_price')->nullable();
            $table->integer('heavy_unit_distance')->nullable();
            $table->integer('heavy_unit_additional_price')->nullable();
            $table->integer('cargo_price')->nullable();
            $table->integer('cargo_unit_distance')->nullable();
            $table->integer('cargo_unit_additional_price')->nullable();
            $table->integer('truck_type_id');
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
        Schema::dropIfExists('volant_pricings');
    }
}
