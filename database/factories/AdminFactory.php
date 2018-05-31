<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
       'nama'       =>  $faker->name,
       'user'       =>  $faker->userName,
       'password'   =>  bcrypt('password'),
    ];
});
