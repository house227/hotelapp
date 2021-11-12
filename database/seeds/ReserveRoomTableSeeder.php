<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReserveRoomTableSeeder extends Seeder{

    public function run()
    {
        DB::table('reserve_room')->insert([
            [
                'reservation_id' => '1',
                'room_id' => '1',
                'room_num'=>'100',
                'check_in' => '2021-02-27',
                'check_out' => '2021-11-09',
                'price' => '500',
            ],
            [
                'reservation_id' => '2',
                'room_id' => '10',
                'room_num'=>'400',
                'check_in' => '2022-02-27',
                'check_out' => '2022-11-09',
                'price' => '1000',
            ],
        ]);
    }
}
