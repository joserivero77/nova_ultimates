<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

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
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
    public function productosv()
    {
        return $this->hasMany("App\Models\ProductoVendido", "id_venta");
    }



    public function status(){
        switch ($this->status) {
            case 'PENDIENTE':
                return 'Pendiente';
                break;
            case 'PAGADO':
                return 'Pagado';
                break;
            case 'ANULADA':
                    return 'Anulada';
                    break;

            default:
                # code...
                break;
        }
    }

    public function get_active_factura(){
        return Self::where('status','PAGADA');
    }
}
