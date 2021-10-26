<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration{


    public function up(){

        //予約マイグレーション
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hoteluser_id');
            $table->integer('person_num');
            $table->date('check_in');
            $table->date('check_out');
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
        Schema::dropIfExists('reservations');
    }
}
