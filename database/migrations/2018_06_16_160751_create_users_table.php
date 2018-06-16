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
            $table->increments('id')->unique();
            $table->string('name', 100);
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('email', 100);
            $table->string('tell', 100);
            $table->dateTime('birthday');

              $table->string('remember_token', 100)->nullable();

            $table->boolean('admin_right');
            $table->dateTime('modified');
            $table->dateTime('created');
        });

    }

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
