<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HotelusersTableSeeder extends Seeder{

    public function run(){
        
        DB::table('hotelusers')->insert([
            [
                'name' => '田中太郎',
                'mail' => 'taro@tanaka',
                'tel' => '0120444444',
            ],
            [
                'name' => '管理者',
                'mail' => 'kanri@123',
                'tel' => '0120111111',
            ],
        ]);
    }
}


