<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Page::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->paragraph,
        'user_id' => factory(App\Models\User::class)->create()->id,
        'active' => 1,
        'published_at' => now()->toDateTimeString()
    ];
});
