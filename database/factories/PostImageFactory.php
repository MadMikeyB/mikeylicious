<?php

use Faker\Generator as Faker;

$factory->define(App\PostImage::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'post_id' => factory(App\Post::class)->create()->id,
        'path' => $faker->imageUrl()
    ];
});
