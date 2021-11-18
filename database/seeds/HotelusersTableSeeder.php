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
                'created_at' => now()
            ],
            [
                'name' => '管理者',
                'mail' => 'kanri@123',
                'tel' => '0120111111',
                'created_at' => now()
            ],
        ]);


        // Fakerでダミーデータを作成
        $faker = \Faker\Factory::create('ja_JP');

        for ($i = 0; $i < 10; $i++){
        $param = [
            'name' => $faker->name(),
            // safeEmail実在しないアドレスになる為処理作業も安心して出来る
            'mail' => $faker->safeEmail(),
            'tel' => str_replace('-', '', $faker->phoneNumber()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('hotelusers')->insert($param);
        }

        // Factoryでダミーデータを作成
        // factory(App\hoteluser::class,20)->create();
    }
}