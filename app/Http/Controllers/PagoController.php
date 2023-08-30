<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;

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

        //return view("amd.ventas.ventas_index", ["ventas" => $ventasConTotales,'ConTotales'=>$ConTotales]);
        $ventas=Venta::get();
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio)*1.16 as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
            //dd($ventasConTotales);
        return view("amd.pagos.index", ['pagos'=>Pago::all(),'ventas'=>Venta::get(),'totales'=>$ventasConTotales]);
    }

    public function create()
    {
        //dd($request);
        // Recupera los datos necesarios de la solicitud
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio)*1.16 as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
            dd($ventasConTotales);
        //return view("amd.ventas.ventas_index", ["ventas" => $ventasConTotales]);
        //$id_venta = $request->input('id_venta');
        //$id_cliente = $request->input('id_cliente');
        $ventas=Venta::get();
        // Aquí puedes escribir la lógica para mostrar el formulario de pago
        return view('amd.pagos.create', compact('ventas','ventasConTotales','total'));
    }

    public function store(Request $request)
    {
        dd($request);
        // Valida los datos enviados en el formulario de pago
        $validatedData = $request->validate([
            'id_venta' => 'required',
            'id_cliente' => 'required',
            'parcialBs' => 'required',
            'resta' => 'required',
            'descripcion' => 'required',
        ]);

        // Crea un nuevo pago en la tabla de facturas
        Factura::create($validatedData);

        // Redirecciona a la página de visualización de pagos o a donde desees
        return redirect()->route('pago.index');
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

            $totalfinal=$total;

        }
        return view("amd.pagos.create", [
            "venta" => $venta,
            "total" => $total,

            "totalfinal"=>$totalfinal,
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
