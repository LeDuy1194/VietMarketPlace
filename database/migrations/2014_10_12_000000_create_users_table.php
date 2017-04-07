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
            $table->increments('id');
            $table->string('username', 60)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->tinyInteger('level')->default(0);
            $table->string('fullname')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->smallInteger('district')->nullable();
            $table->string('phone', 16)->nullable();
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps('create_at');
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
