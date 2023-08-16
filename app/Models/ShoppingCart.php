<?php

namespace App\Models;

use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable=
        ['status',
        'user_id',
        'order_date',];

    public function shopping_cart_details(){
        return $this->hasMany(ShoppingCartDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function findOrCreateBySessionId($shopping_cart_id){//funcion que crea o busca un carrito de compras para la sesion
        if($shopping_cart_id){
            //dd($shopping_cart_id);
            return ShoppingCart::find($shopping_cart_id);
        }else{
            //dd($shopping_cart_id);
                return ShoppingCart::create();
        }
    }
    public function quantity_of_products(){
        return $this->shopping_cart_details->sum('quantity');
    }
    public function total_price(){
        $total=0;
        foreach($this->shopping_cart_details as $key=>$shopping_cart_detail){
            $total+=$shopping_cart_detail->price*$shopping_cart_detail->quantity;
        }
        return $total;
    }
    public static function get_the_session_shopping_cart(){
        $session_name='shopping_cart_id';
        $shopping_cart_id=Session::get($session_name);
        $shopping_cart=Self::findOrCreateBySessionId($shopping_cart_id);
        return $shopping_cart;
    }
}
