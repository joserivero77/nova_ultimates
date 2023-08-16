<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Producto;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Models\Provider;
use App\Models\Product;
use App\Models\PurchaseDetails;
use Carbon\Carbon;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;
use App\Models\ProductoComprado;
use Barryvdh\DomPDF\PDF as DomPDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf as DompdfDompdf;
use Cart;


class PurchaseController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    public function terminarOCancelarCompra(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarCompra($request);
        } else {
            return $this->cancelarCompra();
        }
    }

    public function terminarCompra(Request $request)
    {
        // Crear una Compra
        $compra = new Compra();//dd($request);
        $compra->id_provider = $request->input("id_provider");
        $compra->saveOrFail();
        $idCompra = $compra->id;
        $productos = $this->obtenerProductos();
        // Recorrer carrito de compras
        foreach ($productos as $producto) {
            // El producto que se vende...
            $productoComprado = new ProductoComprado();
            $productoComprado->fill([
                "id_compra" => $idCompra,
                "description" => $producto->description,
                "code" => $producto->code,
                "precio" => $producto->precio_compra,
                "cantidad" => $producto->cantidad,
            ]);
            // Lo guardamos
            $productoComprado->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = Producto::find($producto->id);
            $productoActualizado->stock += $productoComprado->cantidad;
            $productoActualizado->saveOrFail();
        }//dd($producto->cantidad);
        $this->vaciarProductos();
        return redirect()
            ->route("comprar.index")
            ->with("mensaje", "Compra terminada");
    }

    private function obtenerProductos()
    {
        $productos = session("productosc");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }

    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    private function guardarProductos($productos)
    {
        session(["productosc" => $productos,
        ]);
    }

    public function cancelarCompra()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("comprar.index")
            ->with("mensaje", "Compra cancelada");
    }

    public function quitarProductoDeCompra(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);
        return redirect()
            ->route("comprar.index");
    }

    public function agregarProductoCompra(Request $request)
    {
        dd($request);
        $codigo = $request->post("codigo");
        $producto = Producto::where("code", "=", $codigo)->first();//dd($producto->name);
        if (!$producto) {
            return redirect()
                ->route("comprar.index")
                ->with("mensaje", "Producto no encontrado");
        }
        $this->agregarProductoACarrito($producto);
        return redirect()
            ->route("comprar.index");
    }

    private function agregarProductoACarrito($producto)
    {
        if ($producto->stock <=0) {
            return redirect()->route("comprar.index")
                ->with([
                    "mensaje" => "No hay existencias del producto",
                    "tipo" => "danger"
                ]);
        }
        $productos = $this->obtenerProductos();//dd($productos);
        $posibleIndice = $this->buscarIndiceDeProducto($producto->code, $productos);//dd($posibleIndice);
        // Es decir, producto no fue encontrado
        if ($posibleIndice === -1) {
            $producto->cantidad = 1;
            array_push($productos, $producto);
        } else {
            if ($productos[$posibleIndice]->cantidad + 1 > $producto->stock) {
                return redirect()->route("comprar.index")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
            }//dd($productos[$posibleIndice]->cantidad);
            $productos[$posibleIndice]->cantidad++;
        }
        $this->guardarProductos($productos);
    }

    private function buscarIndiceDeProducto(string $codigo, array &$productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto->code === $codigo) {//dd($producto->code);
                return $indice;
            }
        }
        return -1;
    }

    public function index()
    {
        //
        $providers=Provider::get();
        $products=Product::get();
        $prod=Producto::get_active_products()->get();//dd($prod);
        $purchases=Purchase::orderBy('id')->paginate(5);
        return view('amd.purchase.index', compact('purchases','products','providers','prod'));
        //return view('amd.compra.index', compact('purchases','products','providers'));
    }

    public function create()
    {
        //
        $products=Product::get();
        $providers=Provider::get();
        $purchases=Purchase::get();
        $prod=Producto::get_active_products()->get();//dd($prod);
        return view('amd.purchase.create',compact('purchases','providers','products','prod'));
    }


    public function store(StorePurchaseRequest $request, PurchaseDetails $purchaseDetails)
    {
        //
        $purchaseDetails = new PurchaseDetails();dd($purchaseDetails);
if ($purchaseDetails) {
    //$product = $purchaseDetails->getProduct();
    //$product->updateStock();updateStock
}
        /*$purchaseDetails->product_id = $request->product_id;
        $purchaseDetails->quantity = $request->quantity;
        $purchaseDetails->updateStock();*/
        //dd($request);
        $purchase=Purchase::create($request->all()+[
            'purchase_date'=>Carbon::now('America/Caracas'),
            'user_id'=>Auth::user()->id,
            //'user_id'=>'2',
        ]);
        foreach($request->product_id as $key=>$product){
            $results[]=array('product_id'=>$request->product_id[$key],
            'quantity'=>$request->quantity[$key],'price'=>$request->price[$key]);
        };
        $purchase->purchaseDetails()->createMany($results);
        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        //
        //dd($purchase);
        $subtotal=0;
        $purchaseDetails=$purchase->purchaseDetails;
        foreach($purchaseDetails as $purchaseDetail){
            $subtotal+=$purchaseDetail->quantity*$purchaseDetail->price;
        };

        return view('amd.purchase.show',compact('purchase','subtotal','purchaseDetails'));

    }

    public function edit(Purchase $purchase)
    {
        //
        $providers=Provider::get();
        return view('amd.purchase.edit',compact('purchase'));
    }

    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //
        //$purchase->update($request->all());
        //return redirect()->route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $Purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
        //$purchase->delete();
        //return redirect()->route('purchase.index');
    }

    public function pdf(Purchase $purchase)
    {

$subtotal=0;
$purchaseDetails=$purchase->purchaseDetails;
foreach($purchaseDetails as $purchaseDetail){
    $subtotal+=$purchaseDetail->quantity*$purchaseDetail->price;

}
$pdf=PDF::loadView('amd.purchase.pdf',compact('purchase','subtotal','price'));
return $pdf->download('Reporte de compra_'.$purchase->id.'.pdf');

        //return  $pdf->download('Reporte_de_Compra-'.$purchase->id.'.pdf');
        //return $pdf->stream('Reporte_de_Compra.pdf');
        //$pdf = DomPDF::loadView('amd.pdf.pdf', $purchase);
    //$pdf->loadHTML('<h1>Test</h1>');
    }
    public function upload(Request $request, Purchase $purchase)
    {
        //
        //$purchase->update($request->all());
        //return redirect()->route('purchase.index');
    }
    public function change_status( Purchase $purchase)
    {
        if ($purchase->status=='VALID') {
            $purchase->update(['status'=>'CANCELED']);
            return redirect()->back();
        } else {
            $purchase->update(['status'=>'VALID']);
            return redirect()->back();
        }
    }
}
