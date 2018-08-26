<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Portfolio::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'intro' => $faker->paragraph,
        'slug' => str_slug($title),
        'body' => $faker->paragraph,
        'user_id' => factory(App\Models\User::class)->create()->id,
        'link' => $faker->url,
        'active' => 1,
        'published_at' => now()->toDateTimeString()
    ];
});
