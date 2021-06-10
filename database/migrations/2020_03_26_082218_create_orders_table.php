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
            $table->integer("category_id");
            $table->integer("user_id");
            $table->string("sender_name")->nullable();
            $table->string("sender_phone")->nullable();
            $table->string("recipient_name");
            $table->string("recipient_phone");
            $table->integer("truck_type_id");
            $table->double("package_price", 12, 2);
            $table->double("distance", 12, 2);
            $table->integer("stops_count")->default(0);
            $table->string("description");
            $table->datetime("pickup_datetime");
            $table->datetime('delivery_datetime')->nullable();
            $table->string("instructions")->nullable();
            $table->integer("payment_id")->nullable();
            $table->integer("status")->default(0);
            $table->string("device")->nullable();
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
