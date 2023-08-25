<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=[
        'id_venta',//nro de factura
        'id_cliente',//cliente
        'description',
        'deuda',//
        'pago_parcial',//
        'tipo',//unidad de tipo de producto, grams, litros, onzas, sacos, cajas etc.
        'status',


    ];

    public function productos()
    {
        return $this->hasMany(Venta::class);
    }

    public function cliente()
    {
        return $this->belongsTo("App\Models\Cliente", "id_cliente");
    }

    public function status(){
        switch ($this->status) {
            case 'PENDIENTE':
                return 'PAGADO';
                break;
            case 'DESACTIVED':
                return 'Desactivado';
                break;

            default:
                # code...
                break;
        }
    }

    public function get_active_factura(){
        return Self::where('status','PAGADO');
    }
}
