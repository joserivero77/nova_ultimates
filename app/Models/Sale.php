<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=[
        //'client_id',
        'user_id',
        'sale_date',//fecha de venta
        'tax',//impuesto
        'total',
        'status',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function saleDetails(){
        return $this->hasMany(saleDetails::class);
    }
    public function products()
    {
        //return $this->hasMany("App\Models\ProductoVendido", "sale_id");
        return $this->hasMany(ProductoVendido::class);
    }
}
