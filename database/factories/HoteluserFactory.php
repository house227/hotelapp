<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\hoteluser::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        // safeEmail実在しないアドレスになる為処理作業も安心して出来る
        'mail' => $faker->safeEmail(),
        // 電話番号の「-」を削除
        'tel' => str_replace('-', '', $faker->phoneNumber()),
    ];
});
