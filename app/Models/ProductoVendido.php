<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoVendido extends Model
{
    protected $table = "productos_vendidos";
    protected $fillable = ["id_venta", "description", "code", "precio", "cantidad","name"];

public function producto()
{
    return $this->belongsTo(Producto::class, 'code', 'code');
}
    protected $guarded=[];
}
