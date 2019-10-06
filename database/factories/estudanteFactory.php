<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Estudante;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Estudante::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->email,
        'matricula' => $faker->unique()->swiftBicNumber()
    ];
});
