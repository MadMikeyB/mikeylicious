<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->paragraph,
        'user_id' => factory(App\Models\User::class)->create()->id,
        'category_id' => factory(App\Models\Category::class)->create()->id,
        'status' => 'publish',
        'published_at' => now()->toDateTimeString()
    ];
});
