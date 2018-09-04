<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Categories;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['pages.layout','pages.edit-product','pages.add-product'],function($view){
            $menu = Categories::get();
            $view->with('menu',$menu);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
