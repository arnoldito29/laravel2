<?php

use App\Models\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Message::class, function (Faker $faker) {
    return [
        'sender_id' => factory(App\User::class)->create()->id,
        'receiver_id' => factory(App\User::class)->create()->id,
        'message' => Str::random(10),
    ];
});
