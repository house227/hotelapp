<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder{

// https://coinbaby8.com/laravel-seeder-factory-faker.html
// の書き方でシードを記入
    public function run(){
        
        DB::table('rooms')->insert([

            //テスト用
            [
                'roomgroup_id' => '1',
                'room_num' => '100',
                'reserved' => 'yes'
            ],
            // 洋風
            [
                'roomgroup_id' => '1',
                'room_num' => '101',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '1',
                'room_num' => '102',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '1',
                'room_num' => '103',
                'reserved' => 'no'
            ],
            

            // 和風
            [
                'roomgroup_id' => '2',
                'room_num' => '201',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '202',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '203',
                'reserved' => 'no'
            ],

            // 洋風スイート
            [
                'roomgroup_id' => '3',
                'room_num' => '301',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '3',
                'room_num' => '302',
                'reserved' => 'no'
            ],

            // テスト
            [
                'roomgroup_id' => '4',
                'room_num' => '400',
                'reserved' => 'yes'
            ],

            // 和風スイート
            [
                'roomgroup_id' => '4',
                'room_num' => '401',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '4',
                'room_num' => '401',
                'reserved' => 'no'
            ],
        ]);
    }
}
