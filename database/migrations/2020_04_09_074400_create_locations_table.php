<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("location_id")->nullable();
            $table->string("name");
            $table->string("address")->nullable();
            $table->float("latitude", 10, 6)->default(0.000000);
            $table->float("longitude", 10, 6)->default(0.000000);
            $table->integer("order_id");
            $table->integer("is_stopover")->default(0);
            $table->integer("is_destination")->default(-1);
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
        Schema::dropIfExists('locations');
    }
}
