<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder{

// https://coinbaby8.com/laravel-seeder-factory-faker.html
// の書き方でシードを記入
    public function run(){
        
        DB::table('rooms')->insert([
            [
                'roomgroup_id' => '1',
                'room_num' => '101'
            ],
            [
                'roomgroup_id' => '1',
                'room_num' => '102'
            ],
            [
                'roomgroup_id' => '1',
                'room_num' => '103'
            ],
            [
                'roomgroup_id' => '1',
                'room_num' => '104'
            ],
            [
                'roomgroup_id' => '1',
                'room_num' => '105'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '201'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '202'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '203'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '204'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '205'
            ],
        ]);
    }
}
