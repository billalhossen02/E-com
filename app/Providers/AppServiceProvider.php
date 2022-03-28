<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;

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
        Schema::defaultStringLength(191);

        view()->composer('exampleEasycheckout', function ($view) {
        
            $view->with('cartItems', $cartItems = \Cart::getContent());
            
        });

        view()->composer('frontend.index', function ($view) {
        
            $categories = Category::all();
            $sliders = Slider::all();
            $products = Product::all();
            $view->with(['categories' => $categories, 'sliders' => $sliders, 'products' => $products]);
            
        });

        
       
    }
}
