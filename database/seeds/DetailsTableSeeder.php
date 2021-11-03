<?php

use Illuminate\Database\Seeder;

class DetailsTableSeeder extends Seeder{

    public function run(){

        DB::table('details')->insert([
            [
                'reservation_id' => '1',
                'room_id' => '1',
                'room_num'=>'100',
                'stay' => '2021-02-27',
                'price' => '$1200',
            ],
        ]);
    }
}
