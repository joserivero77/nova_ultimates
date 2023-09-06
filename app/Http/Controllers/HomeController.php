<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pago;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function amd()
    {
        //2. Para obtener los clientes con ventas aún no pagadas, puedes utilizar el siguiente código en tu controlador:

$clientesSinPagos = Cliente::whereHas('ventas', function ($query) {
    $query->whereDoesntHave('pagos');

})->count();
//Esto te dará una colección de clientes que tienen ventas sin pagos.

//3. Para obtener la cantidad de clientes con ventas con deudas por mes, puedes utilizar el siguiente código en tu controlador:

/*$clientesConDeudasPorMes = Cliente::whereHas('ventas', function ($query) {
    $query->whereHas('pagos', function ($query) {
        $query->where('deuda', '>', 0);
    });
})
->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
->groupBy('month')
->get();*/
//Esto te dará una colección de objetos con el mes y la cantidad de clientes que tienen ventas con deudas para cada mes.

$pagospendientes = Pago::where('status', 'PENDIENTE')->count();
//Esto te dará el número de ventas que tienen el estado "ANULADA".


        return view('amd.board',compact('clientesSinPagos','pagospendientes'));
    }
}
