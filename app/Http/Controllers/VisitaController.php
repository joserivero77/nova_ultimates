<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Visita;
use App\Http\Requests\Visitas\StoreRequest;
use App\Models\Client;
use Barryvdh\DomPDF\PDF;
use App\Http\Requests\StoreVisitaRequest;
use Carbon\Carbon;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Cliente::all();
        $visitas=Visita::paginate(5);
        return view('amd.visita.index', compact('visitas','clients'))
        ->with('1',(request()->input('page',1)-1)*$visitas->perPage());
    }
    public function pdf(){
        $visitas=145;
        //dd($visitas);
        $pdf=Pdf::loadView('amd.visita.pdf', compact('visitas'));

        return $pdf->stream();
        //return view('amd.visita.pdf');
    }
    public function imprimir(){
        $visitas=Visita::all();
        $pdf=\Pdf::loadView('pdf');
        //return $pdf->stream('primerpdf.pdf');
        $pdf=Pdf::loadView('amd.visita.pdf', compact('visitas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes=Cliente::all();
        $visitas= Visita::get();//dd($clientes);
        return view('amd.visita.create',compact('visitas','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisitaRequest $request)
    {
        //
        //$clientes=Cliente::all();
        //dd($clientes);
        $clients=$request->client_id;//dd('mi cliente:'.$clients);

        $visitas=Visita::create($request->all()+[
            'visita_date'=>Carbon::now('America/Caracas'),
            'client_id'=>$request->client_id,

        ]); //dd($visitas);$visitas->save();

        return redirect()->route('visitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visita  $Visita
     * @return \Illuminate\Http\Response
     */
    public function show(Visita $visita)
    {
        //
        //dd($visita);
        $clients=Client::get();
        return view('amd.visita.show',compact('visita','clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visita  $Visita
     * @return \Illuminate\Http\Response
     */
    public function edit(Visita $visita)
    {
        //


        $clients=Cliente::get();//dd($visi);
        return view('amd.visita.edit',compact('visita','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Visita  $Visita
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Visita $visita)
    {
        //
        $visita->update($request->all());
        return redirect()->route('visitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visita  $Visita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visita $visita)
    {
        //
        $visita->delete();
        return redirect()->route('visitas.index');
    }

}
