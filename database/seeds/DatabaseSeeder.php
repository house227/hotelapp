<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    
    public function run(){
        //部屋種テーブルシーダーの登録
        
        $this->call(RoomgroupsSeeder::class);
        $this->call(RoomsTableSeeder::class);
    }
}
