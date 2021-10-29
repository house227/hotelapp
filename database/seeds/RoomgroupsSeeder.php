<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomgroupsSeeder extends Seeder{
    
    //roomgroupsテーブルに
    public function run(){
        
        $param =[
            'room_name' => '洋風',
            'room_people' => '5'
        ];
        DB::table('roomgroups')->insert($param);

        $param =[
            'room_name' => '和風',
            'room_people' => '5'
        ];
        DB::table('roomgroups')->insert($param);
    }
}
