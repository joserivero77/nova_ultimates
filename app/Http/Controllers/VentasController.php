<?php
/*


*/ ?>
<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use App\Models\Pago;
use Mike42\Escpos\Printer;

class VentasController extends Controller
{

    public function ticket(Request $request)
    {
        $venta = Venta::findOrFail($request->get("id"));
        $nombreImpresora = env("NOMBRE_IMPRESORA");
        $connector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($connector);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setEmphasis(true);
        $impresora->text("Ticket de venta\n");
        $impresora->text($venta->created_at . "\n");
        $impresora->setEmphasis(false);
        $impresora->text("Cliente: ");
        $impresora->text($venta->cliente->nombre . "\n");
        $impresora->text("\nh\n");
        $impresora->text("\n===============================\n");
        $total = 0;
        foreach ($venta->productos as $producto) {
            $subtotal = $producto->cantidad * $producto->precio;
            $total += $subtotal;
            $impresora->setJustification(Printer::JUSTIFY_LEFT);
            $impresora->text(sprintf("%.2fx%s\n", $producto->cantidad, $producto->descripcion));
            $impresora->setJustification(Printer::JUSTIFY_RIGHT);
            $impresora->text('$' . number_format($subtotal, 2) . "\n");
        }
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->text("\n===============================\n");
        $impresora->setJustification(Printer::JUSTIFY_RIGHT);
        $impresora->setEmphasis(true);
        $impresora->text("Total: $" . number_format($total, 2) . "\n");
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setTextSize(1, 1);
        $impresora->text("Gracias por su compra\n");
        $impresora->text("");
        $impresora->feed(5);
        $impresora->close();
        return redirect()->back()->with("mensaje", "Ticket impreso");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto=Producto::get();
        $pagos=Pago::get();
        $ConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio*0.16) as sutotal"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio) as total"))

            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio*1.16) as totalfinal"), DB::raw("sum(productos_vendidos.cantidad) as vent"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
        //dd($ventasConTotales);
        return view("amd.ventas.ventas_index", ["ventas" => $ventasConTotales,'totales'=>$ventasConTotales,'producto'=>$producto,'pagos'=>$pagos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        $total = 0;
        //dd($venta);
        foreach ($venta->productos as $producto) {
            $total += $producto->cantidad * $producto->precio;

        }
        $totalfinal=$total;
        return view("amd.ventas.ventas_show", [
            "venta" => $venta,
            "total" => $total,

            "totalfinal"=>$totalfinal,
        ]);
    }
    public function pdf(Venta $venta){

        $total = 0;
        //dd($venta);
        //$venta=Venta::get();
        foreach ($venta->productos as $producto) {
            $total += $producto->cantidad * $producto->precio;

        }

        $pdf=\Pdf::loadView('amd.ventas.ventas_pdf',[
            "venta" => $venta,
            "total" => $total,

        ]);
        return $pdf->stream('ReporteVenta_'.$venta->id.'.pdf');
    }

    /*public function anularVenta(Venta $venta)
    {
        DB::transaction(function () use ($venta) {
            foreach ($venta->productos as $producto) {
                $producto->stock += $producto->cantidad;
                $producto->save();
            }
        // Actualizar el estado de la venta a "ANULADA"
        $venta->estado = 'ANULADA';
        $venta->save();  });

        // Realizar cualquier otra lógica necesaria, como devolver los productos al stock

        return redirect()->route('ventas.index')->with('success', 'Venta anulada exitosamente.');
    }*/
    public function anularVenta(Venta $venta)
{
    // Obtener la lista de productos vendidos de la venta
    $productosVendidos = $venta->productos;//dd($productosVendidos);

    // Actualizar el valor de stock para cada producto vendido
    foreach ($productosVendidos as $productoVendido) {
        $producto = Producto::where('code', $productoVendido->code)->first();
        $producto->stock += $productoVendido->cantidad;
        // Actualizar el estado de la venta a "ANULADA"

    }
    $venta->estado = 'ANULADA';
        $venta->save();//dd($producto);
        $producto->save();
    return redirect()->route('ventas.index')->with('success', 'Venta anulada exitosamente.');
    // Anular la venta (actualizar el estado de la venta, etc.)

    // Redirigir o retornar la respuesta adecuada
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route("ventas.index")
            ->with("mensaje", "Venta anulada");
    }
}
