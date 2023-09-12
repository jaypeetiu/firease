<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('station_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('station_user');
    }
}
