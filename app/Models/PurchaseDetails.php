<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=[
        'purchase_id',
        'product_id',
        'quantity',
        'price',

    ];
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function updateStock()
    {
        $product = $this->product;
        $product->stock -= $this->quantity; dd($product);
        $product->save();
    }
    public function getProduct()
    {
    return Product::find($this->product_id);
    }

}
