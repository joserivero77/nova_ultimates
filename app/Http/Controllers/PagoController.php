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

        //return view("amd.ventas.ventas_index", ["ventas" => $ventasConTotales,'ConTotales'=>$ConTotales]);
        $ventas=Venta::get();$pagos=Pago::where('status','=','PENDIENTE')->get();
        $deuda=Pago::select(['deuda'])->get();
        $maux=$deuda;
        //dd($deuda);
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio)*1.16 as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
            //$pagos=Pago::select("deuda","pago_parcial")->groupBy("pagos.id")->get();

            //dd($ventasConTotales);
        return view("amd.pagos.index", compact('pagos','ventas','maux'),['totales'=>$ventasConTotales]);
    }

    public function create()
    {
        //dd($request);
        $ventas = Venta::all();
        $clientes = Cliente::all();
        //dd($ventas);

        // Recupera los datos necesarios de la solicitud
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio)*1.16 as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
        $pagos=Venta::join("pagos","pagos.id_venta","=","ventas.id")
        ->select("pagos.*","deuda","pago_parcial")->groupBy("ventas.id","pagos.id")->get();

        // Aquí puedes escribir la lógica para mostrar el formulario de pago
        return view('amd.pagos.create', compact('ventas','ventasConTotales','total', 'clientes','pagos'));
    }

    public function store(Request $request)
    {
        //dd($request);
        // Valida los datos enviados en el formulario de pago

        // Crea un nuevo pago en la tabla de facturas

        // Actualizar el estado de la venta

        $pago_parcial = $request->get('pago_parcial');//dd($pago_parcial);
        $divisa = $request->get('divisa');
        //$description = $request->get('descripcion');
        $monto = $request->get('monto1');//dd($monto);
        $check=$request->get('inlineRadioOptions');//dd($check);

        $id_venta = $request->get('id_venta');
        if($check=='option1' ){
            $tipo="Pago en Divisa";
            $deuda = $request->get('deuda');

        }else{
            $tipo="Pago en Bolivares";
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
        $pagado=new Pago();
        $pagado->id_venta=$request->get('id_venta');
        $pagado->id_cliente=$request->get('id_cliente');
        $pagado->pago_parcial=$request->get('pago_parcial');
        $pagado->description=$request->get('description');
        $pagado->tipo=$tipo;
        $pagado->deuda=$deuda;
        $pagado->status=$status;
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
