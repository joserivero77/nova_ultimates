@extends("layouts.amd")
@section("titulo", "Detalle de compra")
@section('stylescss')
<style>
    /* Estilos CSS personalizados para la factura */
    table {
        border-collapse: collapse;
        width: 100%;
        border-radius: 2px;border: 2px solid black;
    }

    th,
    td {
        border: 1px solid rgb(25, 193, 209) !important;
        text-align: center;
        padding: 8px;
        border-radius: 2px !important;

    }
    table th{

        text-align: center;
        color: white;
        background-color:rgb(25, 193, 209);
    }
    div .fact{
        border: 3.8px solid rgb(25, 193, 209);
            border-radius: 15px;
    }

</style>
@section("content")
    <div class="row">
        <div class="col-12">
            <h3>Detalle de compra #{{$compra->id}}</h3>
            <h5><b>Proveedor:</b> {{$compra->provider->name}}</h5>
            @if(session("mensaje"))
                <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
                    {{session('mensaje')}}
                </div>
            @endif
            <h2><a class="btn btn-info btn-sm" href="{{route("compras.index")}}">
                <i class="fa fa-arrow-left"></i>&nbsp;Volver
            </a></h2>

            <br>
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
                    @foreach($compra->productos as $productoComprado)
                        <tr>
                            <td><a href="{{ route('products.show',$productoComprado->producto->code) }}">{{ $productoComprado->producto->name}}</a></td>
                            <td>{{$productoComprado->description}}</td>
                            <td>Bs{{number_format($productoComprado->precio, 2)}}</td>
                            <td>{{$productoComprado->cantidad}}</td>
                            <td>Bs{{number_format($productoComprado->cantidad * $productoComprado->precio, 2)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><strong>Total</strong></td>
                        <td>Bs{{number_format($total, 2)}}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
