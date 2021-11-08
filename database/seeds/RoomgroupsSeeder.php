<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomgroupsSeeder extends Seeder{

    public function run(){
        
        DB::table('roomgroups')->insert([
            [
                'room_name' => '洋室',
                'room_people' => '3'
            ],
            [
                'room_name' => '和室',
                'room_people' => '3'
            ],
            [
                'room_name' => '洋室スイート',
                'room_people' => '5'
            ],
            [
                'room_name' => '和室スイート',
                'room_people' => '5'
            ],
            
        ]);
    }
}
