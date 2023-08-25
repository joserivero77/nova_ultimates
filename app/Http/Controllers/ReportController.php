<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function reporte_dia(){
        $ventas=Venta::whereDate('created_at',Carbon::today('America/Caracas'))->get();

        return view('amd.reportes.reporte_dia',compact('ventas'));
    }
    public function reporte_fecha(){
        $ventas=Venta::whereDate('updated_at',Carbon::today('America/Caracas'))->get();
        return view('amd.reportes.reporte_fecha',compact('ventas'));
    }
    public function reporte_results(Request $request){
        $fi=$request->fecha_ini.' 00:00:00';
        $ff=$request->fecha_fin.' 11:59:59';
        $ventas=Venta::whereBetween('created_at',[$fi,$ff])->get();//dd($ventas);
        $total=$ventas->sum('id');
        return view('amd.reportes.reporte_fecha',compact('ventas'));
    }
}
