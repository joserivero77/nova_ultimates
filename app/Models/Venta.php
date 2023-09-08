<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'code',
        'id_venta',
        'description',
        'cantidad',
        'precio',
        'id_producto',

    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function productos()
{
    return $this->hasMany( ProductoVendido::class, 'id_venta',  'id');
}
public function productosdeVenta()
{
    return $this->hasMany( Producto::class, 'code',  'id');
}
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_venta');
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

    protected $guarded=[];

}
