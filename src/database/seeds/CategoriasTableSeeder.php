<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\BetaGT\Marketplace\Models\Categoria::class, 5)->create();

        factory(\BetaGT\Marketplace\Models\Categoria::class, 5)->create()->each(function($c) {
            for ($i=0; $i < 5; $i++)
            {
                $c->children()->save(factory(\BetaGT\Marketplace\Models\Categoria::class)->make([
                    'parent_id' => mt_rand(1,5)
                ]));

                $c->filtros()->save(factory(\BetaGT\Marketplace\Models\Filtro::class)->make());
            }
        });
    }
}
