@extends("layouts.amd")
@section("titulo", "Realizar venta")
@section("content")
    <div class="row">
        <div class="col-12">
            <h1><i class="fa fa-cart-plus"></i>Nueva venta </h1>
                  @if(session("mensaje"))
    <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
        {{session('mensaje')}}
    </div>
@endif
<div></div>
<div class="page-header">
    <h3 class="page-title">-------------------</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
            <li class="breadcrumb-item"><a href="{{ route('ventas.index') }}">Historial de Ventas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Vender</li>
      </ol>
    </nav>
</div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route("terminarOCancelarVenta")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_cliente">Cliente</label>
                            <select required class="form-control" name="id_cliente" id="id_cliente">
                                <option>Seleccione Cliente</option>
                                @foreach($clientes as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        @if(session("productos") !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                    venta
                                </button>
                                <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                    venta
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{route("agregarProductoVenta")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="codigo">Código del producto</label>
                            <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                   class="form-control"
                                   placeholder="">

                        </div>
                    </form>
                </div>
            </div>
            @if(session("productos") !== null)
                <h2>Total: Bs{{number_format($total, 2)}}</h2>
                <div class="table-responsive">
                    <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session("productos") as $producto)
                            <tr>
                                <td>{{$producto->code}}</td>
                                <td>{{$producto->description}}</td>
                                <td>${{number_format($producto->precio_venta, 2)}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>
                                    <form action="{{route("quitarProductoDeVenta")}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="indice" value="{{$loop->index}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h2>Aquí aparecerán los productos de la venta
                    <br>
                    Escribe el código del producto y presiona Enter</h2>
            @endif
        </div>
    </div>
@endsection
