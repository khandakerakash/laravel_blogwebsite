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

use App\User;
use App\Post;

$user_id = User::all()->pluck('id')->toArray();
$post_id = Post::all()->pluck('id')->toArray();

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) use($user_id) {
    static $password;

    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 300),
        'cover_image' => $faker->imageUrl(100, 100, 'business'),
        'user_id' => $faker->randomElement($user_id),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) use($user_id, $post_id) {
    static $password;

    return [
        'user_id' => $faker->randomElement($user_id),
        'post_id' => $faker->randomElement($post_id),
        'description' => $faker->text($maxNbChars = 50),
    ];
});

