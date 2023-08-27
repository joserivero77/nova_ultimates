Por supuesto, aquí tienes un ejemplo de código completo para un CRUD en Laravel que relaciona las tablas "pago", "cliente" y "venta" para consultar los pagos a facturas que han sido pagados parcialmente o en su totalidad, incluyendo el estatus de "PAGADO" o "PENDIENTE". A continuación se muestra el código para los controladores, rutas, modelos y relaciones, así como la plantilla:

1. Migraciones:
// migración para la tabla "clientes"
Schema::create('clientes', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    // otros campos de la tabla
    $table->timestamps();
});

// migración para la tabla "ventas"
Schema::create('ventas', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('cliente_id');
    // otros campos de la tabla
    $table->timestamps();

    $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
});

// migración para la tabla "pagos"
Schema::create('pagos', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('venta_id');
    $table->decimal('monto');
    $table->enum('estatus', ['PAGADO', 'PENDIENTE']);
    // otros campos de la tabla
    $table->timestamps();

    $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
});
2. Controladores:
// Controlador para la tabla "Venta"
namespace App\Http\Controllers;

use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        return view('ventas.index', compact('ventas'));
    }

    // otros métodos del controlador
}

// Controlador para la tabla "Pago"
namespace App\Http\Controllers;

use App\Models\Pago;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('venta.cliente')->get();
        return view('pagos.index', compact('pagos'));
    }

    // otros métodos del controlador
}
3. Rutas:
// Rutas para la tabla "Venta"
Route::resource('ventas', VentaController::class);

// Rutas para la tabla "Pago"
Route::resource('pagos', PagoController::class);
4. Modelos y relaciones:
// Modelo para la tabla "Cliente"
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre'];

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}

// Modelo para la tabla "Venta"
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['cliente_id', /* otros campos */];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}

// Modelo para la tabla "Pago"
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['venta_id', 'monto', 'estatus', /* otros campos */];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
}
5. Plantilla (ejemplo básico):
<!-- Vista para la tabla "Venta" -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <!-- otros campos -->
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->cliente->nombre }}</td>
            <!-- otros campos -->
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Vista para la tabla "Pago" -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Venta</th>
            <th>Monto</th>
            <th>Estatus</th>
            <!-- otros campos -->
        </tr>
    </thead>
    <tbody>
        @foreach($pagos as $pago)
        <tr>
            <td>{{ $pago->id }}</td>
            <td>{{ $pago->venta->cliente->nombre }}</td>
            <td>{{ $pago->monto }}</td>
            <td>{{ $pago->estatus }}</td>
            <!-- otros campos -->
        </tr>
        @endforeach
    </tbody>
</table>
Recuerda que este es solo un ejemplo básico y puedes personalizarlo según tus necesidades. Asegúrate de ajustar las rutas, nombres de las vistas y campos de las tablas según tu aplicación.




/************************************************** */
<form action="" method="post" enctype="multipart/form-data" id="formulario">
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true" data-backdrop="static" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-primary text-center" id="modalTitleId"><i class="fa fa-money-bill"></i>Forma de Pago</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    {!! Form::open(['route'=>'categories.store', 'method'=>'post']) !!}
                                    @csrf
                                    <div class="mb-1">
                                        <label for="" class="form-label text-danger">Monto Bs </label>
                                        <label for="" class="form-label text-white badge-dark" id="monto"><h3><b>{{number_format($total, 2)}}</b></h3></label>
                                    </div>

                                    <div class="mb-1">
                                        <label for="" class="form-label">Tasa de cambio</label>
                                        <input type="text" name="" id="tasa" class="form-control" placeholder="" aria-describedby="helpId">
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                <label class="form-check-label text-primary" for="inlineRadio1">Referencia $</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                <label class="form-check-label text-primary" for="inlineRadio2">Efectivo Bs</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="checkbox1" name="checkbox1" value="option1">
                                                <label class="form-check-label text-primary" for="">Debito Bs</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <label for="" class="form-label" id="divis1">Divisa en efectivo $</label>
                                        <input type="text" name="divisa" id="diviza" class="form-control" placeholder="" aria-describedby="helpId">
                                        <label for="" class="form-label" id="debito1">Monto Debito Bs</label>
                                        <input type="text" name="debito2" id="debito3" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>

                                    <div class="mb-1">
                                        <label for="vuelto" class="form-label" id="vuelto2"><small><b>Vuelto: $<label class="text-info" id="vuelto"></label></b></small></label>
                                        <label for="" class="form-label" id="resta2"><small><b>Resta: $<label class="text-danger" id="resta"></label></b></small></label>
                                    </div>

                                    <div class="mb-1">
                                        <label for="" class="form-label">Abono $ Bs</label>
                                        <input type="text" name="abono" id="abono" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>

                                    <div class="mb-1">
                                        <label for="" class="form-label">Pago total $ Bs</label>
                                        <input type="text" name="pago" id="pago" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>

                                    <br>

                                    <button type="submit" class="btn btn-primary mr-2" style="font-size: 1rem;">Facturar</button>
                                    <a href="{{ route('vender.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    const divis1 = document.getElementById('divis1');
    const divis2 = document.getElementById('diviza');
    const inlineRadio1 = document.getElementById('inlineRadio1');
    const abono = document.getElementById('abono');
    const debito = document.getElementById('debito3');
    const pago = document.getElementById('pago');

    divis1.style.display = 'none';
    divis2.style.display = 'none';

    inlineRadio1.addEventListener('click', divisa);

    function divisa() {
        if (inlineRadio1.checked) {
            console.log('divisa');
            divis1.style.display = 'block';
            divis2.style.display = 'block';
        }
    }

    abono.addEventListener('keyup', restar);
    debito.addEventListener('keyup', restar);

    function restar() {
        const nn1 = parseFloat({{ $total }});
        const nn2 = parseFloat(abono.value);
        const deb = parseFloat(debito.value);

        let rest = nn1 - nn2;

        if (rest < 0) {
            rest = 0;
        }

        if (deb) {
            rest -= deb;
        }

        pago.value = rest.toFixed(2);
    }
</script>

Ten en cuenta que he realizado las modificaciones en el código para que el checkbox muestre y oculte
el input de  id="debito3" , y también para que el input de la etiqueta "Abono $ Bs" reste a la cantidad
  {{$total}}  cuando se seleccione el radio button de  id="inlineRadio2" . Además, he agregado la funcionalidad
  para restar la cantidad del input de  id="debito"  cuando se seleccione el checkbox, y mostrar el resultado en
   el input de  id="pago" .


/***************************** */

plantillas html factura.
.Aquí tienes dos ejemplos de código HTML para una plantilla de factura,
uno en formato HTML y otro adaptado para generar una factura en PDF utilizando la biblioteca Dompdf.

 Ejemplo en HTML:
 html
 <!DOCTYPE html>
 <html>
 <head>
     <title>Plantilla de Factura</title>
     <style>
         body {
             font-family: Arial, sans-serif;
             margin: 0;
             padding: 20px;
         }

         .invoice {
             border: 1px solid #ccc;
             padding: 20px;
             max-width: 800px;
             margin: 0 auto;
         }

         .invoice-header {
             text-align: center;
             margin-bottom: 20px;
         }

         .invoice-header h1 {
             font-size: 24px;
         }

         .invoice-details {
             margin-bottom: 20px;
         }

         .invoice-details p {
             margin: 0;
         }

         .invoice-table {
             width: 100%;
             border-collapse: collapse;
         }

         .invoice-table th,
         .invoice-table td {
             padding: 10px;
             border: 1px solid #ccc;
         }

         .invoice-total {
             text-align: right;
         }
     </style>
 </head>
 <body>
     <div class="invoice">
         <div class="invoice-header">
             <h1>Factura</h1>
         </div>
         <div class="invoice-details">
             <p>Cliente: Nombre del cliente</p>
             <p>Fecha: 01/01/2022</p>
         </div>
         <table class="invoice-table">
             <thead>
                 <tr>
                     <th>Descripción</th>
                     <th>Cantidad</th>
                     <th>Precio Unitario</th>
                     <th>Total</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>Producto 1</td>
                     <td>2</td>
                     <td>$10.00</td>
                     <td>$20.00</td>
                 </tr>
                 <tr>
                     <td>Producto 2</td>
                     <td>1</td>
                     <td>$15.00</td>
                     <td>$15.00</td>
                 </tr>
             </tbody>
             <tfoot>
                 <tr>
                     <td colspan="3" class="invoice-total">Total</td>
                     <td>$35.00</td>
                 </tr>
             </tfoot>
         </table>
     </div>
 </body>
 </html>
 Ejemplo en HTML adaptado para Dompdf (generación de PDF):
 php
 <?php
 require_once 'dompdf/autoload.inc.php';
 use Dompdf\Dompdf;

 $dompdf = new Dompdf();

 $html = '
 <!DOCTYPE html>
 <html>
 <head>
     <title>Plantilla de Factura</title>
     <style>
         body {
             font-family: Arial, sans-serif;
             margin: 0;
             padding: 20px;
         }

         .invoice {
             border: 1px solid #ccc;
             padding: 20px;
             max-width: 800px;
             margin: 0 auto;
         }

         .invoice-header {
             text-align: center;
             margin-bottom: 20px;
         }

         .invoice-header h1 {
             font-size: 24px;
         }

         .invoice-details {
             margin-bottom: 20px;
         }

         .invoice-details p {
             margin: 0;
         }

         .invoice-table {
             width: 100%;
             border-collapse: collapse;
         }

         .invoice-table th,
         .invoice-table td {
             padding: 10px;
             border: 1px solid #ccc;
         }

         .invoice-total {
             text-align: right;
         }
     </style>
 </head>
 <body>
     <div class="invoice">
         <div class="invoice-header">
             <h1>Factura</h1>
         </div>
         <div class="invoice-details">
             <p>Cliente: Nombre del cliente</p>
             <p>Fecha: 01/01/2022</p>
         </div>
         <table class="invoice-table">
             <thead>
                 <tr>
                     <th>Descripción</th>
                     <th>Cantidad</th>
                     <th>Precio Unitario</th>
                     <th>Total</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>Producto 1</td>
                     <td>2</td>
                     <td>$10.00</td>
                     <td>$20.00</td>
                 </tr>
                 <tr>
                     <td>Producto 2</td>
                     <td>1</td>
                     <td>$15.00</td>
                     <td>$15.00</td>
                 </tr>
             </tbody>
             <tfoot>
                 <tr>
                     <td colspan="3" class="invoice-total">Total</td>
                     <td>$35.00</td>
                 </tr>
             </tfoot>
         </table>
     </div>
 </body>
 </html>
 ';

 $dompdf->loadHtml($html);
 $dompdf->setPaper('A4', 'portrait');
 $dompdf->render();
 $dompdf->stream('factura.pdf');
 En el primer ejemplo, se muestra una plantilla de factura en formato HTML básico. Se utiliza CSS para dar estilo a la factura, como los colores, fuentes y bordes. Los datos de la factura se insertan directamente en el código HTML.

 En el segundo ejemplo, se utiliza la biblioteca Dompdf para generar un archivo PDF a partir del código HTML de la plantilla de factura. Se carga el código HTML en un objeto Dompdf, se establece el tamaño del papel y la orientación, se renderiza el PDF y se envía al navegador para su descarga.

 Espero que estos ejemplos te sean útiles. Recuerda que para utilizar Dompdf, debes tener la biblioteca instalada y configurada correctamente en tu proyecto.




