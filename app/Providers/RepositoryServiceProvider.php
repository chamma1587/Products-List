<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\AuthRepository;
use App\Repository\ProductRepository;
use App\Repository\Contracts\AuthRepositoryInterface;
use App\Repository\Contracts\ProductRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);    
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);    
       
    }
}