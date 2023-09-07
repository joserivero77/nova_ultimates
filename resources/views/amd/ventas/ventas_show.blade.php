@extends('layouts.amd')
@section('titulo', 'Detalle de venta')
@section('stylescss')
    <style>
        /* Estilos CSS personalizados para la factura */
        table {
            border-collapse: collapse;
            width: 100%;
            border-radius: 2px;
            border: 2px solid black;
        }

        th,
        td {
            border: 1px solid rgb(25, 193, 209) !important;
            text-align: center;
            padding: 8px;
            border-radius: 2px !important;

        }

        table th {

            text-align: center;
            color: white;
            background-color: rgb(25, 193, 209);
        }

        div .fact {
            border: 3.8px solid rgb(25, 193, 209);
            border-radius: 15px;
        }
    </style>
@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Detalle de venta Factura Nº {{ str_pad($venta->id, 5, '0', STR_PAD_LEFT) }}</h3>
            <h5><b>Cliente:</b> {{ $venta->cliente->name }} <br> Direccion Fiscal: {{ $venta->cliente->address }}<br>
                RIF: {{ $venta->cliente->rif }}</h5>
            @if (session('mensaje'))
                <div class="alert alert-{{ session('tipo') ? session('tipo') : 'info' }}">
                    {{ session('mensaje') }}
                </div>
            @endif
            <a class="btn btn-info" href="{{ route('ventas.index') }}">
                <i class="fa fa-arrow-left"></i>&nbsp;Volver
            </a>

            <h2>Productos</h2>
            <div class="table-responsive fact">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venta->productos as $productoVendido)
                            <tr>
                                <td><a
                                        href="{{ route('products.show', $productoVendido->producto->code) }}">{{ $productoVendido->producto->name }}</a>
                                </td>
                                <td>{{ $productoVendido->description }}</td>
                                <td>Bs{{ number_format($productoVendido->precio, 2) }}</td>
                                <td>{{ $productoVendido->cantidad }}</td>
                                <td>Bs{{ number_format($productoVendido->cantidad * $productoVendido->precio, 2) }}</td>
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
@endsection
