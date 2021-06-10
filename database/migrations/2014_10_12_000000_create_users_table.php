<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("f_name")->nullable();
            $table->string("l_name")->nullable();
            $table->string("username")->nullable();
            $table->integer("role");
            $table->integer("account_type");
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->string('phone_2')->nullable();
            $table->string("api_token")->nullable();
            $table->rememberToken();
            $table->string("status");
            $table->string("email_activation_token")->nullable();
            $table->text("user_token")->nullable();
            $table->string("platform")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    // ALTER TABLE `users` ADD `email_activation_token` VARCHAR(255) NULL DEFAULT NULL AFTER `email_verified_at`;
    // ALTER TABLE `users` ADD `user_token` TEXT NULL DEFAULT NULL AFTER `email_activation_token`;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
