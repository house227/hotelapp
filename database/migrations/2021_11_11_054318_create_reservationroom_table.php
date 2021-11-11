<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationroomTable extends Migration{

    public function up()
    {
        Schema::create('reservation_room', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reservation_id');
            $table->integer('room_id');
            $table->integer('room_num');
            $table->date('stay');
            $table->string('price');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reservation_room');
    }
}
