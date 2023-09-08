<!DOCTYPE html>
<html>

<head>
    <title>Detalle de venta</title>
    <style>
        /* Estilos CSS personalizados para la factura */
        table {
            border-collapse: collapse;
            width: 100%;
            border-radius: 25px !important;
        }

        .datosCliente {
            text-align: left !important;

        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;

        }

        table thead {
            border: 2px solid black;
            border-radius: 15px;
            background-color: black;
            color: white;
        }

        h2 {
            text-align: right;
            color: darkred;
        }

        img {
            width: 80px;
            height: 80px;
            margin-top: 20px;
            padding-bottom: 20px;
            border-radius: 5px;
            z-index: -3;
        }

        .watermark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.5;
            /* Ajusta la opacidad según tus necesidades */
            z-index: -1;
        }

        div .parra {

            text-justify: auto;
            text-align: right;
        }

        div .fact {
            border: 3.8px solid rgb(12, 12, 13);
            border-radius: 15px;
        }
    </style>
    <div class="container"><img src="img\descarga.jpeg" alt="Logo" class=""></div>
    <div class="parra col-6">
        <p><small>Nova Inversiones C.A <br>
                Direccion:Urb. Valles de San Diego <br> Apto 5-c 1er piso <br>
                Telefonos:04129874587/04141023579 <br>
                RIF: J-10025486-9</small></p>
    </div>
</head>

<body>
    <div class="container"><img src="img\Pagada.jpg" alt="anulada" class="watermark"></div>
    @if ($venta->estado == 'ANULADA')
        <div class="container"><img src="img\Anulada.jpg" alt="anulada" class="watermark"></div>
    @endif




    <div class="row">
        <div class="col-12">
            <h2>Factura Nº{{ str_pad($venta->id, 5, '0', STR_PAD_LEFT) }}</h2>
            <h3>Fecha:{{ $venta->created_at->format('d/m/Y') }}</h3>

            <div class="table-responsive-md fact">
                <table class="table table-primary " id="datosCliente">

                    <tbody>
                        <tr>
                            <td scope="col" class="datosCliente">Razon Social:{{ $venta->cliente->name }}</td>
                            <td scope="col" class="datosCliente">Cedula:{{ $venta->cliente->cedula }}</td>
                            <td scope="col" class="datosCliente">R.I.F:{{ $venta->cliente->rif }}</td>

                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="">
                            <td class="datosCliente" colspan="3">Direccion fiscal:{{ $venta->cliente->address }}</td>
                        </tr>
                        <tr aria-rowspan="2">

                            <td scope="col" class="datosCliente">Telefono:{{ $venta->cliente->phone }}</td>
                            <td scope="col" class="datosCliente" colspan="2">email:{{ $venta->cliente->email }}
                            </td>
                        </tr>

                    </tfoot>
                </table>
            </div>


            <br>
            <div class="table-responsive fact">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead class="dat">
                        <tr>
                            <th class="td-esq-izq">Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venta->productos as $productoVendido)
                            <tr>
                                <td>{{ $productoVendido->producto->name }}</td>
                                <td>{{ $productoVendido->description }}</td>
                                <td>Bs{{ number_format($productoVendido->precio, 2) }}</td>
                                <td>{{ $productoVendido->cantidad }}</td>
                                <td>Bs{{ number_format($productoVendido->cantidad * $productoVendido->precio, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>SubTotal</strong></td>
                            <td>Bs{{ number_format($total, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>I.V.A (16,0%)</strong></td>
                            <td>Bs{{ number_format($total * 0.16, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Total</strong></td>
                            <td>Bs{{ number_format($total * 1.16, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
