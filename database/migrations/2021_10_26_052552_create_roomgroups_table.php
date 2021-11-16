<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomgroupsTable extends Migration
{
    //部屋種別マイグレーション
    public function up(){
        Schema::create('roomgroups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('room_name');
            $table->integer('room_people');
            $table->integer('price');
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
        Schema::dropIfExists('roomgroups');
    }
}
