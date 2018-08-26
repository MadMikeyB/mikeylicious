<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Field::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'page_id' => factory(App\Models\Page::class)->create()->id
    ];
});
