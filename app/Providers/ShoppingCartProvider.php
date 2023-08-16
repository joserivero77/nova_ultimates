<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer("*.index",function ($view){
            $session_name='shopping_cart_id';
            $shopping_cart_id=Session::get($session_name);//dd($shopping_cart_id);
            //$shopp=ShoppingCartDetail::find($shopping_cart_id);//dd($view);
            $shopping_cart=ShoppingCart::findOrCreateBySessionId($shopping_cart_id);//dd($shopping_cart_id);
            //$shop=$shopping_cart->id;//dd($shop);
            Session::put($session_name,$shopping_cart->id);
            $view->with('shopping_cart',$shopping_cart);

        });
    }
}
