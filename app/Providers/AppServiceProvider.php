<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\ProductService;
use App\Interfaces\ProductServiceInterface;
use App\Repositories\ProductRepository;
use App\Interfaces\ProductRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
