<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;
use App\Models\Statistical;
use App\Models\Visitor;
use App\Models\Post;
use App\Models\Customer;
use App\Models\Order;
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
        view()->composer('*',function($view){
            $product = Product::all()->count();
            $post = Post::all()->count();
            $order = Order::all()->count();
            $customer = Customer::all()->count();


            $min_price = Product::min('product_price');
            $max_price = Product::max('product_price');
            $view->with(compact('min_price','max_price','product','post','order','customer'));
        });


    }
}
