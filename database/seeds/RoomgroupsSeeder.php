<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomgroupsSeeder extends Seeder{

    public function run(){
        
        DB::table('roomgroups')->insert([
            [
                'room_name' => '洋風',
                'room_people' => '3'
            ],
            [
                'room_name' => '和風',
                'room_people' => '3'
            ],
            [
                'room_name' => '洋風スイート',
                'room_people' => '5'
            ],
            [
                'room_name' => '和風スイート',
                'room_people' => '5'
            ],
            
        ]);
    }
}
