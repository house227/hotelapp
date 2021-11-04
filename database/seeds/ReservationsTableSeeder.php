<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReservationsTableSeeder extends Seeder{

    public function run(){
        

        DB::table('reservations')->insert([
            [
                'hoteluser_id' => '1',
                'person_num' => '3',
                'check_in' => '2021-02-27',
                'check_out' => '2021-11-09'
            ],
            [
                'hoteluser_id' => '1',
                'person_num' => '5',
                'check_in' => '2022-02-27',
                'check_out' => '2022-11-09'
            ],
        ]);
    }
}


