@extends("layouts.amd")
@section("titulo", "Detalle de venta ")
@section("content")
    <div class="row">
        <div class="col-12">
            <h1>Detalle de venta #{{$venta->id}}</h1>
            <h1>Cliente: <small><b>{{$venta->cliente->name}}</b></small></h1>
            @if(session("mensaje"))
            <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
                {{session('mensaje')}}
            </div>
        @endif
            <a class="btn btn-info" href="{{route("ventas.index")}}">
                <i class="fa fa-arrow-left"></i>&nbsp;Volver
            </a>
            <a class="btn btn-success" href="{{route("ventas_pdf", ["id" => $venta->id])}}">
                <i class="fa fa-print"></i>&nbsp;Reporte
            </a>
            <h2>Productos</h2>
            <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Cod. Producto</th>
                    <th>Descripción</th>

                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($venta->productos as $producto)
                    <tr>
                        <td><a href="{{ route('products.show',$producto->code) }}">{{ $producto->code}}</a></td>
                        <td>{{$producto->description}}</td>

                        <td>Bs{{number_format($producto->precio, 2)}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>Bs{{number_format($producto->cantidad * $producto->precio, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>


                    <td colspan="3"></td>
                    <td><strong>SubTotal</strong></td>
                    <td>Bs{{number_format($total, 2)}}</td>

                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Impuesto (16,0%) </strong></td>
                    <td>Bs{{ number_format($producto->cantidad * $producto->precio*0.16,2) }}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total</strong></td>
                    <td>Bs{{ number_format($producto->cantidad * $producto->precio*1.16,2) }}</td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
