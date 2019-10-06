<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Professor;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Professor::class, function (Faker $faker) {
    return [
        'siape' => $faker->unique()->swiftBicNumber(),
        'campus' => 'Igarassu',
        'nome' => $faker->name,
        'senha' => '123'
    ];
});
