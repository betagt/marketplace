<?php

namespace BetaGT\Marketplace;

use BetaGT\Marketplace\Repositories\CategoriaRepository;
use BetaGT\Marketplace\Repositories\CategoriaRepositoryEloquent;
use BetaGT\Marketplace\Repositories\FiltroRepository;
use BetaGT\Marketplace\Repositories\FiltroRepositoryEloquent;
use BetaGT\Master\MasterServiceProvider;
use Illuminate\Support\ServiceProvider;

class MarketplaceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__ . "/Http/routes.php";

        $this->publishes([
            __DIR__ . "/resources/views" => base_path('resources/views'),
            __DIR__ . "/database/factories" => $this->app->databasePath() . "/factories",
            __DIR__ . "/database/migrations" => $this->app->databasePath() . "/migrations",
            __DIR__ . "/database/seeds" => $this->app->databasePath() . "/seeds",
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(MasterServiceProvider::class);

        $this->app->bind(CategoriaRepository::class, CategoriaRepositoryEloquent::class);
        $this->app->bind(FiltroRepository::class, FiltroRepositoryEloquent::class);
    }
}
