<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
        'cedula',
        'rif',
        'address',
        'phone',
        'email',

    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function sales(){
        return $this->hasMany(Sale::class);
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_cliente');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_cliente');
    }
}
