<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'cedula' => $faker->id,
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName
    ];
});
