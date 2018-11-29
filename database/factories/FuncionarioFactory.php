<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Funcionario::class, function (Faker $faker) {
    $empresa_ids = \DB::table('empresas')->select('id')->get();
    $empresa_id = $faker->randomElement($empresa_ids)->id;

    return [
        'nome' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telefone' => $faker->cellphoneNumber,
        'cpf' => $faker->cpf,
        'empresa_id' => $empresa_id
    ];
});
