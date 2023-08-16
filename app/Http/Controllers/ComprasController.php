<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class ComprasController extends Controller
{

   /* public function ticket(Request $request)
    {
        $compra = Compra::findOrFail($request->get("id"));
        $nombreImpresora = env("NOMBRE_IMPRESORA");
        $connector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($connector);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);
        $impresora->setEmphasis(true);
        $impresora->text("Ticket de compra\n");
        $impresora->text($compra->created_at . "\n");
        $impresora->setEmphasis(false);
        $impresora->text("Cliente: ");
        $impresora->text($compra->cliente->nombre . "\n");
        $impresora->text("\nh\n");
        $impresora->text("\n===============================\n");
        $total = 0;
        foreach ($compra->productos as $producto) {
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
    }/*

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprasConTotales = Compra::join("productos_comprados", "productos_comprados.id_compra", "=", "compras.id")
            ->select("compras.*", DB::raw("sum(productos_comprados.cantidad * productos_comprados.precio) as total"),DB::raw("sum(productos_comprados.cantidad) as cante"))
            ->groupBy("compras.id", "compras.created_at", "compras.updated_at", "compras.id_provider")
            ->orderBy('compras.created_at','asc')
            ->get();
        return view("amd.compras.compras_index", ["compras" => $comprasConTotales]);
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
     * @param \App\Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        $total = 0;$cante=0;

        foreach ($compra->productos as $producto) {
            $total += $producto->cantidad * $producto->precio;
            $cante+=$producto->cantidad;

        }
        return view("amd.compras.compras_show", [
            "compra" => $compra,
            "total" => $total,
            "cante"=>$cante,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Compra $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route("compras.index")
            ->with("mensaje", "Compra eliminada");
    }
}
