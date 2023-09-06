<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\ComprarController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReportController;
use Barryvdh\DomPdf\Facade\Pdf;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('layouts.amd');
});
/*Route::get('/', function () {
  return view('layouts.amd');
});*/

Auth::routes();
Route::resource('pagos',PagoController::class)->names('pagos');
Route::get('/grafica-deudas', [ChartController::class, 'deudaPorCliente'])->name('grafica.deudas');
Route::get('/obtener-datos-venta', [PagoController::class,'obtenerDatosVenta']);
Route::get('ventas/reporte_dia', [ReportController::class,'reporte_dia'])->name('reporte.dia');
Route::get('ventas/reporte_fecha', [ReportController::class,'reporte_fecha'])->name('reporte.fecha');
Route::post('ventas/reporte_results', [ReportController::class,'reporte_results'])->name('reporte.results');

Route::get('categories/pdf2',[Controller::class,'imprimir'])->name('imprimir');
Route::get('visita/visitas/pdf',[VisitaController::class, 'imprimir'])->name('visitas.pdf');
Route::get('categories/pdf',[CategoryController::class, 'imprime'])->name('category.pdf');
Route::get('pdf',[ProductController::class, 'pdf'])->name('catalogoproducto.pdf');
Route::get("/ventas/{venta}/pdf", [VentasController::class, 'pdf'])->name("ventas_pdf");

Route::resource('categories', CategoryController::class)->names('categories');
Route::get('categories/modal/create','CategoryController@create')->name('create');
Route::resource('clients', ClientController::class)->names('clients');

Route::resource('vender/vender', ClientController::class)->names('vender');

Route::resource('products', ProductController::class)->names('products');
Route::resource('purchases', PurchaseController::class)->names('purchases');
Route::post('/pasarIdc/{code}', [ComprarController::class,'pasarIdc'])->name('pasarIdc');
Route::post('/pasarId/{code}', [VenderController::class,'pasarId'])->name('pasarId');

Route::resource('providers', ProviderController::class)->names('providers');
Route::resource('sales', SaleController::class)->names('sales');
Route::resource('visitas', VisitaController::class)->names('visitas');

Route::get('products/add-to-cart/{id}',[ProductController::class,'addtocart'])->name('add_to_cart');
Route::get('products/cart',[ProductController::class, 'cart'])->name('cart');
Route::delete('products/remove-from-cart', [ProductController::class,'remove'])->name('remove_from_cart');
Route::patch('products/update-cart',[ProductController::class,'updatecart'])->name('update_cart');


//Route::get('purchases/pdf/{purchase}','PurchaseController@pdf')->name('purchases.pdf');
Route::get('purchases/pdf/{purchase}',[PurchaseController::class,'pdf'])->name('purchases.pdf');
Route::get('sales/pdf/{sale}',[SaleController::class,'pdf'])->name('sales.pdf');


Route::get('products/change_status/{product}',[ProductController::class, 'change_status'])->name('change_status');

Route::get('purchases/upload/{purchase}',[PurchaseController::class,'upload'])->name('upload.purchases');
Route::resource('shopping_cart_detail','ShoppingCartDetailController')->only('store','update','destroy')->names('shopping_cart_details');

        Route::resource("clientes", ClientesController::class)->names('clientes');
        Route::resource("usuarios", UserController::class)->parameters(["usuarios" => "user"]);
        Route::resource("productos", ProductosController::class);
        Route::get("/ventas/ticket", [VentasController::class,'ticket'])->name("ventas.ticket");
        Route::resource("ventas", VentasController::class);
        Route::get("/vender", [VenderController::class, 'index'])->name("vender.index");
        Route::get("/productoDeVenta", [VenderController::class, 'agregarProductoVenta'])->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", [VenderController::class,'quitarProductoDeVenta'])->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", [VenderController::class, 'terminarOCancelarVenta'])->name("terminarOCancelarVenta");
        Route::post("agregarCantidadProductov/{code}", [VenderController::class, 'agregarCantidadProductov'])->name("agregarCantidadProductov");

        Route::resource("compras", ComprasController::class);
        Route::get("/comprar", [ComprarController::class, 'index'])->name("comprar.index");
        Route::get("/productoDeCompra", [ComprarController::class, 'agregarProductoCompra'])->name("agregarProductoCompra");
        Route::delete("/productoDeCompra", [ComprarController::class,'quitarProductoDeCompra'])->name("quitarProductoDeCompra");
        Route::post("/terminarOCancelarCompra", [ComprarController::class, 'terminarOCancelarCompra'])->name("terminarOCancelarCompra");
        Route::post("/agregarCantidadProductoc/{code}", [ComprarController::class, 'agregarCantidadProductoc'])->name("agregarCantidadProductoc");
        //Route::get('/pagos',[PagoController::class,'index'])->name('pago.index');
        //Route::get('/pagos/create',[PagoController::class,'create'])->name('pago.create');
        //Route::post('/pagos/create', [PagoController::class, 'create'])->name('pago.create');
        //Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('home_amd', [HomeController::class, 'index'])->name('home');
Route::resource('/cart', CartController::class);
Route::get('livewire.purchases/create/{Cart}','Create@render')->name('Cart.purchases');
Route::post('/Cart-add',[CartController::class,'add'])->name('cart.add');
Route::get('/Cart-checkout',[CartController::class,'cart'])->name('cart.checkout');
Route::post('/Cart-clear',[CartController::class,'clear'])->name('cart.clear');
Route::get('/Cart-removeitem',[CartController::class,'removeitem'])->name('cart.removeitem');
Route::get('/cart',)->name('atras');
Route::get('board',[HomeController::class,'amd'])->name('amd');
Route::get('/exchange-rate', [ExchangeRateController::class,'index']);




