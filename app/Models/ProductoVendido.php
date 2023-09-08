<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoVendido extends Model
{
    protected $table = "productos_vendidos";
    protected $fillable = ["id_venta", "description", "code", "precio", "cantidad","name","id_producto"];

public function producto()
{
    return $this->belongsTo(Producto::class, 'code', 'code');
}
    protected $guarded=[];

    public function productoo()
{
    return $this->belongsToMany(Producto::class, 'id_producto', 'id');
}
public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
}

