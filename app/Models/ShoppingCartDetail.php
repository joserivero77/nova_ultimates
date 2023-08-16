<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'quantity',
        'price',
        'shopping_cart_id',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
