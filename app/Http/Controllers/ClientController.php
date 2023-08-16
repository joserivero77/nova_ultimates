<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Cliente::paginate(4);//dd($clients);
        return view('amd.client.index', compact('clients'));
    }
    public function vender(){
       // $cliente=Client::get();
        //return view('amd.vender.vender',compact('cliente'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('amd.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        //

        Cliente::create($request->all());
        if($request->sale==1){
            return redirect()->back();
        }
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $client)
    {
        //
       // $total_purchases=0;
       // foreach($client->sales as $key=>$sale){
            //$total_purchases+=$sale->total;
        //}
        return view('amd.client.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $client)
    {
        //
        return view('amd.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Cliente $client)
    {
        //
        $client->update($request->all());
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $Client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $client)
    {
        //
        $client->delete();
        return redirect()->route('clients.index');
    }
}
