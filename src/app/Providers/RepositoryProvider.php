<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Mysql\EqUserRepository;
use App\Contracts\Repository\UserRepositoryInterface;
use App\Repository\Mysql\EqStoreRepository;
use App\Contracts\Repository\StoreRepositoryInterface;
use App\Repository\Mysql\EqProductRepository;
use App\Contracts\Repository\ProductRepositoryInterface;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, function() {
            return new EqUserRepository();
        });
        $this->app->singleton(StoreRepositoryInterface::class, function() {
            return new EqStoreRepository();
        });

        $this->app->singleton(ProductRepositoryInterface::class, function() {
            return new EqProductRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
