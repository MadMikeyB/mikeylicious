<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Portfolio::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->paragraph,
        'user_id' => factory(App\Models\User::class)->create()->id,
        'status' => 'publish',
        'published_at' => now()->toDateTimeString()
    ];
});
