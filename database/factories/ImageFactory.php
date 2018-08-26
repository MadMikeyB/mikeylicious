<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\Models\User::class)->create()->id,
        'model_id' => factory(App\Models\Post::class)->create()->id,
        'model_type' => 'App\Models\Post',
        'path' => $faker->imageUrl()
    ];
});
