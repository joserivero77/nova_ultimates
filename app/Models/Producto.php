<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'stock',
        'image',
        'precio_compra',
        'precio_venta',
        'unit',
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
