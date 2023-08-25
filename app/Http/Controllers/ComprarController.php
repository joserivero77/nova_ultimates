<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Provider;
use App\Models\Producto;
use App\Models\ProductoComprado;
use App\MOdels\Compra;
use Illuminate\Http\Request;

class comprarController extends Controller
{

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
        $this->validate($request,[
            "id_provider"=>'required',
        ]);
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
        //dd($request);
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
    //*************************************************************** */
    public function pasarIdc($code){

        $producto=Producto::get();
        $providers=Provider::get();
        $codigo=$code;
        //dd($code);

        $prod=Producto::get_active_products()->get();//dd($codigo);
        //$this->agregarProductoACarrito($producto);
        //return redirect()->back()->with('success','Producto agregado correctamente');
        //dd($code);

        return redirect()->route('agregarProductoCompra',compact('codigo'));
       }
       //*********************************************************** */
    private function agregarProductoACarrito($producto)
    {
        if ($producto->stock <0) {
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
            }
            //$cant = $request->post("cantidad");dd($cant);
            //$productos[$posibleIndice]->$this->agregarCantidadProducto();
            //dd($productos[$posibleIndice]->cantidad);
            $productos[$posibleIndice]->cantidad++;
        }
        $this->guardarProductos($productos);
    }
    /******************************************************* */
    public function agregarCantidadProductoc(Request $request,$code){
        $codigo=$code;
        $producto = Producto::where("code", "=", $codigo)->first();
        $cantidad=$request->post("cantidad");//dd($request);
        $productos = $this->obtenerProductos();//dd($productos);
        $posibleIndice = $this->buscarIndiceDeProducto($producto->code, $productos);
        $productos[$posibleIndice]->cantidad+=$cantidad;
        $this->guardarProductos($productos);
        return redirect()->route("comprar.index");
        //return redirect()->route('pasarIdc',compact('code'));
    }
    /**************************************************************** */


    private function buscarIndiceDeProducto(string $codigo, array &$productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto->code === $codigo) {//dd($producto->code);
                return $indice;
            }
        }
        return -1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::get();

        if($categories){
        $prodo=Producto::get_active_products()->get();//dd($prod);
        $prod=Producto::get();
        $total = 0;$cant=0;
        foreach ($this->obtenerProductos() as $producto) {//dd($producto->cantidad);
            $total += $producto->cantidad * $producto->precio_compra;//dd($total);
            $cant+=$producto->cantidad;//dd($cant);
        }

        return view("amd.comprar.comprar",
            [
                "total" => $total,
                "providers" => Provider::all(),
                "prod"=> $prod,
                "cant"=>$cant,


            ]);
        }
    }
}
