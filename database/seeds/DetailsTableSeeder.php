<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsTableSeeder extends Seeder{

    public function run(){

        DB::table('details')->insert([
            [
                'reservation_id' => '1',
                'room_id' => '1',
                'room_num'=>'100',
                'stay' => '2021-02-27',
                'price' => '$500',
            ],
            [
                'reservation_id' => '2',
                'room_id' => '10',
                'room_num'=>'400',
                'stay' => '2022-02-27',
                'price' => '$1000',
            ],
        ]);
    }
}