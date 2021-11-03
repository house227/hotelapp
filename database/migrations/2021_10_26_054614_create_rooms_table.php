<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{

    public function up(){

        //部屋テーブル
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomgroup_id');
            $table->integer('room_num');
            $table->string('reserved');
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
        Schema::dropIfExists('rooms');
    }
}
