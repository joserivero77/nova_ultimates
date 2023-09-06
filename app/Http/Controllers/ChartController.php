<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pago;

class ChartController extends Controller
{
    //
    public function deudaPorCliente()
    {
        $pagos = Pago::all();

        $data = [];

        foreach ($pagos as $pago) {
            $data[] = [
                'id_cliente' => $pago->cliente->name,
                'deuda' => $pago->deuda,
            ];
        }

        $deudas = Pago::select('id_cliente', 'deuda')
            ->groupBy('id_cliente','pagos.deuda')
            ->get();//dd($deudas);

        $clientes = $deudas->pluck('id_cliente');
        $deudasTotales = $deudas->pluck('deuda');

        return view('grafica.deudas', compact('clientes', 'deudasTotales','data'));
    }
}
