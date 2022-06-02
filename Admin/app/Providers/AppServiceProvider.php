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
            $product = DB::table('products')->get()->count();
            $protype = DB::table('protypes')->get()->count();
            $manufacture = DB::table('manufactures')->get()->count();

            $view->with('product',$product)
                ->with('protype',$protype)
                ->with('manufacture',$manufacture);
        });
    }
}
