<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'title'=> $faker->word,
        'description' => $faker->text($maxNbChars = 100),
        'user_id'=> App\User::all()->random()->id,
        'category_id'=> App\Category::all()->random()->id,
        'modality'=> $faker->randomElement($array = array ('Presencial','Virtual')),
        'price'=> $faker->numberBetween($min = 1000, $max = 9000),
        'image' => $faker->image('public/storage/imagenesDeCursos', $width = 640, $height = 480, null, false),
        
    ];
});
