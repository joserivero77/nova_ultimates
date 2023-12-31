<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\Cliente;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Aquí puedes escribir la lógica para mostrar los pagos registrados


        $ventas = Venta::get();
        //$pagos = Pago::where('status', '=', 'PENDIENTE')->get();
        $pagos=Pago::all();
        //$pagos = Pago::orderBy('created_at', 'desc')->get();

            //dd($ultimosPagos);
        $deuda = Pago::select(['id','id_venta','deuda'])->get();


        $ultimasFilas=$this->obtenerUltimasFilasPorIdVenta();
        //$deudaAnterior = $ultimoPago->deuda;

        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio)*1.16 as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();

        $totales = $ventasConTotales;
        $clientes = Venta::pluck('id_cliente', 'id');

        //dd($ventasConTotales);
        return view("amd.pagos.index", compact('pagos', 'ventas','deuda', 'clientes','ultimasFilas','totales'));
    }
    public function obtenerDatosVenta(Request $request)
    {
        $idVenta = $request->input('idVenta');

        // Obtener los datos de la venta
        $venta = Venta::find($idVenta);

        if ($venta) {
            // Verificar si ya existe un pago para la venta
            $existePago = Pago::where('id_venta', $idVenta)->exists();

            if ($existePago) {
                // Obtener los pagos relacionados con la venta
                $pagos = Pago::where('id_venta', $idVenta)->where('status', '=', 'PENDIENTE')->get();

                return response()->json([
                    'success' => true,
                    'existePago' => true,
                    'pagos' => $pagos
                ]);
            } else {
                // Obtener las facturas sin pago relacionadas con la venta
                $facturas = $venta->facturasSinPago;

                return response()->json([
                    'success' => true,
                    'existePago' => false,
                    'facturas' => $facturas
                ]);
            }
        }

        return response()->json([
            'success' => false
        ]);
    }

    public function obtenerUltimasFilasPorIdVenta()
{
    $ultimasFilas = Pago::whereIn('id', function ($query) {
        $query->selectRaw('MAX(id)')
            ->from('pagos')
            ->groupBy('id_venta');
        })
        ->where(function ($query) {
            $query->where('status', '!=', 'PAGADO')
                ->orWhere('deuda', '!=', 0);
        })->get();
    return $ultimasFilas;
    //return view('tu_vista', compact('ultimasFilas'));
}

    public function create()
    {
        //dd($request);

        //dd($ventas);

        // Recupera los datos necesarios de la solicitud
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio)*1.16 as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
        $pagos = Venta::join("pagos", "pagos.id_venta", "=", "ventas.id")
            ->select("pagos.*", "deuda", "pago_parcial")->groupBy("ventas.id", "pagos.id")->get();

        // Aquí puedes escribir la lógica para mostrar el formulario de pago
        $totales = $ventasConTotales;
        $pagos = Pago::where('status', '=', 'PENDIENTE')->get();
        $ventas = Venta::pluck('id_venta', 'id_venta');
        $clientes = Venta::pluck('id_cliente', 'id_venta');
        return view('amd.pagos.create', compact('ventas', 'totales', 'total', 'clientes', 'pagos'));
    }

    public function store(Request $request)
    {
        //dd($request);
        // Valida los datos enviados en el formulario de pago

        // Crea un nuevo pago en la tabla de facturas

        // Actualizar el estado de la venta

        $pago_parcial = $request->get('pago_parcial'); //dd($pago_parcial);
        $divisa = $request->get('divisa');
        //$description = $request->get('descripcion');
        $monto = $request->get('monto1'); //dd($monto);
        $check = $request->get('inlineRadioOptions'); //dd($check);

        $id_venta = $request->get('id_venta');
        if ($check == 'option1') {
            $tipo = "Pago en Divisa";
            $deuda = $request->get('deuda');
        } else {
            $tipo = "Pago en Bolivares";
            $deuda = $request->get('diferen');
        }
        if ($deuda == 0) {
            $status = 'PAGADO';
        } else {
            $status = 'PENDIENTE';
        }
        /*$validatedData = $request->validate([
            'id_venta' => 'required',
            'id_cliente' => 'required',
            'pago_parcial' => 'required',
            'status' => 'string',
            'description' => 'required',
            'deuda'=>'required',
            'tipo'=>'string',
        ]);
        //Pago::create($request->all());
        /*
        $visitas=Visita::create($request->all()+[
            'visita_date'=>Carbon::now('America/Caracas'),
            'client_id'=>$request->client_id,

        ]);

        */

        //dd('nada');
        $pagado = new Pago();
        $pagado->id_venta = $request->get('id_venta');
        $pagado->id_cliente = $request->get('id_cliente');
        $pagado->pago_parcial = $request->get('pago_parcial');
        $pagado->description = $request->get('description');
        $pagado->tipo = $tipo;
        $pagado->deuda = $deuda;
        $pagado->status = $status;
        $pagado->save();
        //Pago::create($request->all());
        // Redirecciona a la página de visualización de pagos o a donde desees
        return redirect()->route('pagos.index')->with('success', 'Pago registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
        $total = 0;

        foreach ($venta->productosv as $producto) {
            $total += $producto->cantidad * $producto->precio;

            $totalfinal = $total;
        }
        return view("amd.pagos.create", [
            "venta" => $venta,
            "total" => $total,

            "totalfinal" => $totalfinal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
