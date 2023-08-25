<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Provider;
use App\Http\Requests\Request;
use App\Models\PurchaseDetails;
use FontLib\Table\Type\name;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\CartCollection;
use Darryldecode\Cart\Facades\CartFacade;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::get();
        $providers=Provider::get();

        if($categories){
        $prod=Producto::get_active_products()->get();//dd($prod);
        $products=Producto::orderBy('id')->paginate(5);
        return view('amd.product.index', compact('products','categories','providers','prod'));
        }else{
            $products=Producto::orderBy('id')->paginate(4);
            return view('amd.product.index', compact('products','categories','providers','prod'));
        }
    }

       public function pdf(){
           $prod=Producto::get_active_products()->get();
           $products=Producto::orderBy('id')->get();
           $pdf=\Pdf::loadView('amd.product.pdf',compact('products','prod'));
           return $pdf->stream('ReporteCatalogoProductos.pdf');
       }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::get();
        $providers=Provider::get();
        return view('amd.product.create', compact('categories','providers'))->with("mensaje","Debe primero adicionar una categoria");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductRequest $request)
    {
        //
        //dd($request);
        $product = Producto::find($request->id);
        //$product->calculateStock();
        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/image'),$image_name);
        }

        //$product->stock = $product->purchases->0sum('quantity') - $product->sales->sum('quantity');
        //$product->save();
        $product=Producto::create($request->all()+[
            'image'=>$image_name,
        ]);
        $product->update(['code'=>$product->id]);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $product)
    {
        //
        $pro=Producto::find($product->id);
        return view('amd.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $product)
    {
        //

        $categories=Category::get();
        $providers=Provider::get();
        return view('amd.product.edit',compact('product','categories','providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductRequest $request, producto $product)
    {
        //

        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $image_name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/image'),$image_name);
        }
        if($request->hasFile('picture')){
            $product->update($request->all()+[
                'image'=>$image_name,
            ]);
        }

        $product->update($request->all());


        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index');
    }
    public function change_status( Producto $product)
    {//dd($product);
        //
        if ($product->status=='ACTIVE') {
            $product->update(['status'=>'DESACTIVED']);
            return redirect()->back();
        } else {
            $product->update(['status'=>'ACTIVE']);
            return redirect()->back();
        }


        //$purchase->update($request->all());
        //return redirect()->route('purchase.index');
    }


    public function updatecart(Request $request){
        if($request->id && $request->quantity){
            $cart=session()->get('cart');
            $cart[$request->id]["quantity"]=$request->quantity;
            session()->put("cart",$cart);
            session()->flash('success','Carrito actualizado correctamente');
        }
    }

    public function addtocart($id){

        $product=Producto::findOrFail($id);
        $cart=session()->get('cart',[]);//dd($product);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                'name'=>$product->name,
                'quantity'=>1,
                'precio_venta'=>$product->precio_venta,
                'image'=>$product->image,
        ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Producto agregado correctamente');
    }
    public function cart(){ return view('amd.product.cart');}

    public function remove(Request $request){
        if($request->id){
            $cart=session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Producto eliminado correctamente');
        }
    }

    /*public function get_products_by_id(Request $request){
        if($request->ajax()){
            $products=Product::findOrFail($request->product_id);
            return response()->json($products);
        }
    }
    public function get_products_by_barcode(Request $request){
        if($request->ajax()){
            $products=Product::where('code',$request->code)->firstOrFile($request->code);
            return response()->json($products);
        }
    }*/

/********************************************************************
    public  function  shop()
    {
        $products  =  Product::all();

        return  view('shop')->withTitle('E-COMMERCE  STORE  |  SHOP')->with(['products'  => $products]);
    }
    public  function  cart()    {
        $cartCollection  =  \Cart::getContent();
        //dd($cartCollection);
        return  view('cart')->withTitle('E-COMMERCE  STORE  |  CART')->with(['cartCollection'  => $cartCollection]);;
    }

    public  function  remove(Request  $request){
        \Cart::remove($request->id);
        return  redirect()->route('cart.index')->with('success_msg',  'Item  is  removed!');
    }

    public  function  add(Request $request){
        \Cart::add(array(
        'id'  =>  $request->id,
        'name'  =>  $request->name,
        'price'  =>  $request->price,
        'quantity'  =>  $request->quantity,
        'attributes'  =>  array(
        'image'  =>  $request->img,
        'slug'  =>  $request->slug
        )
    ));
        return  redirect()->route('cart.index')->with('success_msg',  'Item  Agregado  a  sú  Carrito!'); }

        public  function  update2(Request  $request){
            \Cart::update($request->id,
            array(
            'quantity'  =>  array(
            'relative'  =>  false,
            'value'  =>  $request->quantity
            ),
            ));
        return  redirect()->route('cart.index')->with('success_msg',  'Cart  is  Updated!'); }

        public  function  clear(){
            \Cart::clear();
            return  redirect()->route('cart.index')->with('success_msg',  'Car  is  cleared!'); }*/
}


