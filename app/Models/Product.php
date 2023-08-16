<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=[
        'code',
        'name',
        'description',
        'stock',//existencia
        'image',
        'precio_venta',//precio de venta
        'precio_compra',//precio de compra
        'unit',//unidad de tipo de producto, grams, litros, onzas, sacos, cajas etc.
        'status',
        'category_id',

    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function calculateStock()
    {
        $this->stock = $this->purchases()->sum('quantity') - $this->sales()->sum('quantity');//dd($this->stock);
        $this->save();
    }

    public function status(){
        switch ($this->status) {
            case 'ACTIVE':
                return 'Activo';
                break;
            case 'DESACTIVED':
                return 'Desactivado';
                break;

            default:
                # code...
                break;
        }
    }

    public function get_active_products(){
        return Self::where('status','ACTIVE');
    }
}
