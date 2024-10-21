<?php

namespace App\Providers;
use Darryldecode\Cart\Facades\CartFacade as Cart;
// use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // Paginator::useBootstrapFour();

        View::composer(['*'], function ($view) {
            $view->with([
                "nombreProduit" => Cart::getTotalQuantity(),
                "totalProduit" => Cart::getTotal(),
                "paniers" => Cart::getContent()->sort()
            ]);
        });
    }
}
