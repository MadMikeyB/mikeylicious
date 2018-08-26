<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'model_id' => factory(App\Post::class)->create()->id,
        'model_type' => 'App\Post',
        'path' => $faker->imageUrl()
    ];
});
