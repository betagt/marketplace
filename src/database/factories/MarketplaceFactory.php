<?php

$factory->define(\BetaGT\Marketplace\Models\Categoria::class, function(Faker\Generator $faker){
    $titulo = $faker->name;

    return [
        'parent_id' => 0,
        'titulo' => $titulo,
        'icone' => 'fa fa-dashboard',
        'slug' => str_slug($titulo),
        'prioridade' => null,
    ];
});

$factory->define(\BetaGT\Marketplace\Models\Filtro::class, function(Faker\Generator $faker) {
   return [
       'titulo' => $faker->word,
       'prioridade' => null,
   ];
});