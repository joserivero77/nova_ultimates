<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use App\Models\Producto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prod=Producto::get();
        $products=Product::all();
        $client=Client::get();
        $sales=Sale::get();
        return view('amd.sale.index', compact('sales','client','products','prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients=Client::get();
        $products=Product::get();
        return view('amd.sale.create',compact('clients','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        //

        $sale=Sale::create($request->all()+[
            'sale_date'=>Carbon::now('America/Caracas'),
            'user_id'=>Auth::user()->id,
        ]);
        foreach($request->product_id as $key=>$product){
            $results[]=array('product_id'=>$request->product_id[$key],
            'quantity'=>$request->quantity[$key],'price'=>$request->price[$key],
            'discount'=>$request->discount[$key]);
        }
        if (empty($request->sale_date)) {
            $sale->sale_date = now();
        }
        $sale->saleDetails()->createMany($results);
        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
        $subtotal=0;
        $saleDetails=$sale->saleDetails;
        foreach($saleDetails as $saleDetail){
            $subtotal+=$saleDetail->quantity*$saleDetail->price-(($saleDetail->quantity*$saleDetail->price)*$saleDetail->discount/100);


        };

        return view('amd.sale.show',compact('sale','subtotal','saleDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $Sale)
    {
        //
        $clients=Client::get();
        return view('amd.sale.edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $Sale)
    {
        //
        //$Sale->update($request->all());
        //return redirect()->route('Sale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $Sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $Sale)
    {
        //
        //$Sale->delete();
        //return redirect()->route('Sale.index');
    }
    public function pdf(Sale $Sale)
    {
        //
        $subtotal=0;
        $saleDetails=$Sale->saleDetails;
        foreach($saleDetails as $saleDetail){
            $subtotal+=$saleDetail->quantity*$saleDetail->price;
        }
        $pdf=PDF::loadView('amd.sale.pdf',compact('sale','subtotal','price'));
        return $pdf->download('Reporte de compra_'.$Sale->id.'.pdf');
        //$Sale->delete();
        //return redirect()->route('Sale.index');
    }
}
