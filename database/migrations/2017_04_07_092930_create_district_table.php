<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function(Blueprint $table)
        {
            $table->string('districtid',5);
            $table->string('name',100);
            $table->string('type',30);
            $table->string('location',30);
            $table->string('cityid',5);
            $table->foreign('cityid')->references('cityid')->on('city')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district');
    }
}
