<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Empresa::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->url
    ];
});
