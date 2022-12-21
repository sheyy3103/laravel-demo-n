<?php

namespace App\Providers;

use App\Helpers\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        view()->composer('layout',function($view){
            $layout_categories = Category::all();
            $cart = new Cart;
            $view->with(compact('layout_categories','cart'));
        });
    }
}
