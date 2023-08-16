<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoComprado extends Model
{
    use HasFactory;
    protected $table = "productos_comprados";
    protected $fillable = ["id_compra", "description", "code", "precio", "cantidad"];
}
