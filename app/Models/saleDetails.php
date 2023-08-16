<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saleDetails extends Model
{

    use HasFactory;
    protected $guarded=[];
    protected $fillable=[
        'sale_id',
        'product_id',
        'quantity',
        'price',
        'discount',

    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function updateStock()
    {
        $product = $this->product;
        $product->stock += $this->quantity;
        $product->save();
    }
}
