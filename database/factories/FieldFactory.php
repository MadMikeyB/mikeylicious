<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Field::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'key' => snake_case($title),
        'body' => $faker->paragraph,
        'page_id' => factory(App\Models\Page::class)->create()->id
    ];
});
