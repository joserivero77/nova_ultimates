<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\ProductoVendido;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Http\Requests\VenderStoreRequest;

class VenderController extends Controller
{

    public function terminarOCancelarVenta(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }

    public function terminarVenta(Request $request)
    {//dd($request);
        // Crear una venta
        $this->validate($request,[
            "id_cliente"=>'required',
        ]);
        $venta = new Venta();
        $venta->id_cliente = $request->input("id_cliente");
        $venta->saveOrFail();
        $idVenta = $venta->id;
        $productos = $this->obtenerProductos();
        // Recorrer carrito de compras
        foreach ($productos as $producto) {
            // El producto que se vende...
            $productoVendido = new ProductoVendido();
            $productoVendido->fill([
                "id_venta" => $idVenta,
                "description" => $producto->description,
                "code" => $producto->code,
                "precio" => $producto->precio_venta,
                "cantidad" => $producto->cantidad,
            ]);
            // Lo guardamos
            $productoVendido->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = Producto::find($producto->id);
            $productoActualizado->stock -= $productoVendido->cantidad;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Venta terminada");
    }

    private function obtenerProductos()
    {
        $productos = session("productos");
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
        session(["productos" => $productos,
        ]);
    }

    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Venta cancelada");
    }

    public function quitarProductoDeVenta(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);
        return redirect()
            ->route("vender.index");
    }

    public function agregarProductoVenta(Request $request)
    {
        //dd($request);
        $codigo = $request->post("codigo");
        $producto = Producto::where("code", "=", $codigo)->first();//dd($producto);
        if (!$producto) {
            return redirect()
                ->route("vender.index")
                ->with("mensaje", "Producto no encontrado");
        }

        $this->agregarProductoACarrito($producto);
        return redirect()
            ->route("vender.index");
    }
    //*************************************************************** */
    public function pasarId($code){

        $producto=Producto::get();
        $clientes=Cliente::get();
        $codigo=$code;
        //dd($code);

        $prod=Producto::get_active_products()->get();//dd($codigo);

        return redirect()->route('agregarProductoVenta',compact('codigo'));
       }
       //*********************************************************** */
    private function agregarProductoACarrito($producto)
    {
        if ($producto->stock <= 0) {
            return redirect()->route("vender.index")
                ->with([
                    "mensaje" => "No hay existencias del producto",
                    "tipo" => "danger"
                ]);
        }
        $productos = $this->obtenerProductos();
        $posibleIndice = $this->buscarIndiceDeProducto($producto->code, $productos);//dd($posibleIndice);
        // Es decir, producto no fue encontrado
        if ($posibleIndice === -1) {
            $producto->cantidad = 1;
            array_push($productos, $producto);
        } else {
            if ($productos[$posibleIndice]->cantidad + 1 > $producto->stock) {
                return redirect()->route("vender.index")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
            }
            $productos[$posibleIndice]->cantidad++;
        }
        $this->guardarProductos($productos);
    }
    /******************************************************* */
    public function agregarCantidadProductov(Request $request,$code){
        $codigo=$code;//dd($code);
        $producto = Producto::where("code", "=", $codigo)->first();
        $cantidad=$request->post("cantidad");//dd($request);
        $productos = $this->obtenerProductos();//dd($productos);
        $posibleIndice = $this->buscarIndiceDeProducto($producto->code, $productos);
        $productos[$posibleIndice]->cantidad+=$cantidad;
        $this->guardarProductos($productos);
        return redirect()->route("vender.index");
        //return redirect()->route('pasarId',compact('code'));
    }
    /**************************************************************** */
    private function buscarIndiceDeProducto(string $codigo, array &$productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto->code === $codigo) {
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
        foreach ($this->obtenerProductos() as $producto) {
            $total += $producto->cantidad * $producto->precio_venta;
            $cant+=$producto->cantidad;
        }

        return view("amd.vender.vender",
            [
                "total" => $total,
                "clientes" => Cliente::all(),
                "prod"=>$prod,
                "cant"=>$cant,
                "ventas"=>Venta::all(),

            ]);
        }
    }
}
