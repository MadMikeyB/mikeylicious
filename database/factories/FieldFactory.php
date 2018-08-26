<?php

use Faker\Generator as Faker;

$factory->define(App\Field::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'page_id' => factory(App\Page::class)->create()->id
    ];
});
