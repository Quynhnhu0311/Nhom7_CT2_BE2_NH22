<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

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
        view()->composer('*', function($view){
            $min_price = DB::table('products')->min('price');
            $max_price = DB::table('products')->max('price');
            $min_price_range = $min_price + 500000;
            $max_price_range = $max_price + 10000000;

            $view->with('min_price',$min_price)
                ->with('max_price',$max_price)
                ->with('max_price_range',$max_price_range)
                ->with('min_price_range',$min_price_range);
        });
    }
}
