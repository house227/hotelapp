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
                'room_num' => '100',
                'reserved' => 'yes'
            ],
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
            [
                'roomgroup_id' => '1',
                'room_num' => '104',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '1',
                'room_num' => '105',
                'reserved' => 'no'
            ],
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
            [
                'roomgroup_id' => '2',
                'room_num' => '204',
                'reserved' => 'no'
            ],
            [
                'roomgroup_id' => '2',
                'room_num' => '205',
                'reserved' => 'no'
            ],
        ]);
    }
}
