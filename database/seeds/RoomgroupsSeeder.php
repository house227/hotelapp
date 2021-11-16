<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomgroupsSeeder extends Seeder{

    public function run(){
        
        DB::table('roomgroups')->insert([
            [
                'room_name' => '洋室',
                'room_people' => '3',
                'price' => '500'
            ],
            [
                'room_name' => '和室',
                'room_people' => '3',
                'price' => '500'
            ],
            [
                'room_name' => '洋室スイート',
                'room_people' => '5',
                'price' => '1000'
            ],
            [
                'room_name' => '和室スイート',
                'room_people' => '5',
                'price' => '1000'
            ],
            
        ]);
    }
}
