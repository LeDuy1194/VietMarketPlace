<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voting_user_id')->unsigned();
            $table->foreign('voting_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('voted_user_id')->unsigned();
            $table->foreign('voted_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('vote',1)->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
