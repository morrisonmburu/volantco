<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name')->nullable($value=false);
            $table->string('phoneNo')->default('N/A');
            $table->string('email')->default('N/A');
            $table->string('licenseNo')->default('N/A');
            $table->string('vehicle_type')->default('N/A');
            $table->string('vehicle_model')->default('N/A');
            $table->string('vehicle_color')->default('N/A');
            $table->string('vehicle_platenumber')->default('N/A');
            $table->string('production_year')->default('N/A');
            $table->string('boardNo')->default('N/A');
            $table->string('number_of_passangers')->default('N/A');
            $table->integer('status')->default(0);
            $table->text('driver_avatar')->default('N/A');
            $table->text('vehicle_avatar')->default('N/A');
            $table->string("token");
            $table->string('password');
            $table->integer('is_online')->default(0)->nullable();
            $table->integer('is_special')->default(0)->nullable();
            $table->integer('category')->default(0);
            $table->string('associate_type')->nullable(0);
            $table->text('api_token')->nullable();
            $table->integer('longitude')->nullable();
            $table->integer('latitude')->nullable();
            $table->integer('on_the_move')->default(0)->nullable(0);
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
        Schema::dropIfExists('couriers');
    }
}
