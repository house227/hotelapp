<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReservationsTableSeeder extends Seeder{

    public function run(){
        

        DB::table('reservations')->insert([
            [
                'hoteluser_id' => '1',
                'person_num' => '4',
                'check_in' => '2021-02-27',
                'check_out' => '2021-11-09'
            ],
        ]);
    }
}
