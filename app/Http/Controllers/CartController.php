<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home');
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
    public function add(Request $request){
        $producto=Product::find($request->product_id);
        Cart::add(
            $producto->id,
            $producto->name,
            $producto->price,
            1,
            array("urlfoto"=>$producto->image)
        );
        return back()->with('success',"$producto->name se ha agregado con exito al carrito!");
    }
    public function cart(){
        return view('checkout');
    }
    public function removeitem(Request $request){
        //$producto=Product::where('id',$request->id)->firstOrFail();
        Cart::remove([
            'id'=>$request->id,
        ]);
        return back()->with('success',"Producto eliminado con exito de su carrito!");
    }
    public function clear(){
        Cart::clear();
        return back()->with('success',"El carrito de compras se ha borrado con exito");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{   $product=Product::find($request->id);
    $cart=Cart::add(array(
        'id' => $request->id?$request->id:'1', // inique row ID
        'name' => $request->name?$request->name:'example',
        'price' =>$request->price?$request->price:20.20,
        'quantity' => $request->quantity?$request->quantity:1,
         ));


    return back();
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($cart)
{
    Cart::remove($cart);
    return back();
}
}
