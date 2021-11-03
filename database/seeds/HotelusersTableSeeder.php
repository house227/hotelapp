<?php

use Illuminate\Database\Seeder;

class HotelusersTableSeeder extends Seeder{

    public function run(){
        
        DB::table('hotelusers')->insert([
            [
                'name' => '田中太郎',
                'mail' => 'taro@tanaka',
                'tel' => '0120444444',
            ],
        ]);
    }
}
