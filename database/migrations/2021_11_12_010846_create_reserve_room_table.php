<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserveRoomTable extends Migration
{

    public function up()
    {
        Schema::create('reserve_room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id');
            $table->integer('room_id');
            $table->integer('room_num');
            $table->date('check_in');
            $table->date('check_out');
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
        Schema::dropIfExists('reserve_room');
    }
}
