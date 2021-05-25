<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        //
        'created_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'updated_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'user_id' => $faker->numberBetween(1,2),
        'title' => $faker->realText(20),
        'post_date' => '',
        'feeling_before' => $faker->numberBetween(0,100),
        'feeling_after' => $faker->numberBetween(0,100),
        'post_content' => $faker->realText(40),
    ];
});
