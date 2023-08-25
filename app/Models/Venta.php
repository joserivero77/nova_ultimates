<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public function productos()
    {
        return $this->hasMany("App\Models\ProductoVendido", "id_venta");
    }

    public function cliente()
    {
        return $this->belongsTo("App\Models\Cliente", "id_cliente");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    /*public function client(){
        return $this->belongsTo(Client::class);
    }
    public function saleDetails(){
        return $this->hasMany(saleDetails::class);
    }
    public function products()
    {
        //return $this->hasMany("App\Models\ProductoVendido", "sale_id");
        return $this->hasMany(ProductoVendido::class);
    }*/

}
