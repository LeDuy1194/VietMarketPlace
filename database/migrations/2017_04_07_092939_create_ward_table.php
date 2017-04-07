<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ward', function(Blueprint $table)
        {
            $table->string('wardid',5);
            $table->string('name',100);
            $table->string('type',30);
            $table->string('location',30);
            $table->string('districtid',5);
            $table->foreign('districtid')->references('districtid')->on('district')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ward');
    }
}
