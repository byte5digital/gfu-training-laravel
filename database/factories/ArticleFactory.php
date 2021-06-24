<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Article;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'excerpt' => $faker->sentence,
        'text' => $faker->paragraph,
        'user_id' => factory(User::class),
    ];
});
