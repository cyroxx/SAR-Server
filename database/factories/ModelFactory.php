<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt("das password aus der factory"),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'language_id' => rand(1, 3),
        'user_id' => 1,
        'article_category_id' => rand(1, 2),
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'introduction' => $faker->paragraph,
        'content' => $faker->text,
        'source' => $faker->url,
    ];
});

$factory->define(App\ArticleCategory::class, function (Faker\Generator $faker) {
    return [
        'language_id' => rand(1, 3),
        'user_id' => 1,
        'title' => $faker->sentence,
        'slug' => $faker->slug,
    ];
});

$factory->define(App\EmergencyCase::class, function (Faker\Generator $faker) {

    return [
        'additional_informations' => $faker->sentence,
        'archived' => false,
        'boat_condition' => $faker->word,
        'boat_status' => $faker->word,
        'boat_type' => $faker->word,
        'children_on_board' => $faker->word,
        'disabled_on_board' => $faker->word,
        'engine_working' => $faker->word,
        'operation_area' => $faker->randomDigitNotNull,
        'other_involved' => $faker->word,
        'passenger_count' => $faker->randomDigitNotNull,
        'women_on_board' => $faker->word,
    ];

});

$factory->define(App\EmergencyCaseLocation::class, function (Faker\Generator $faker) {

    return [
        'emergency_case_id' => 0,
        'lat' => $faker->randomFloat(4, 1, 100),
        'lon' => $faker->randomFloat(4, 1, 100),
        'accuracy' => $faker->randomDigitNotNull,
        'connection_type' => $faker->word,
    ];

});