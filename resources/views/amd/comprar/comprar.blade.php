@extends("layouts.amd")
@section("titulo", "Realizar compra")
@section("content")
    <div class="row">
        <div class="col-12">
            <h1><i class="fa fa-cart-plus"></i>Nueva compra </h1>
                  @if(session("mensaje"))
    <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
        {{session('mensaje')}}
    </div>
@endif
<div></div>
<div class="page-header">
    <h3 class="page-title">----------------------</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
            <li class="breadcrumb-item"><a href="{{ route('compras.index') }}">Historial de compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Comprar</li>
      </ol>
    </nav>
</div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route("terminarOCancelarCompra")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_provider">Proveedor</label>
                            <select required class="form-control" name="id_provider" id="id_provider">
                                <!--option->Seleccione provider</option-->
                                @foreach($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(session("productosc") !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                    compra
                                </button>
                                <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                    compra
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{route("agregarProductoCompra")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="codigo">Código del producto</label>
                            <input id="codigo" autocomplete="off"
                            required autofocus
                            name="codigo"
                            type="text"
                            class="form-control"
                            placeholder="">

                        </div>
                    </form>
                </div>
            </div>
            @if(session("productosc") !== null)
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
                        @foreach(session("productosc") as $producto)
                            <tr>
                                <td>{{$producto->code}}</td>
                                <td>{{$producto->description}}</td>
                                <td>Bs{{number_format($producto->precio_compra, 2)}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>
                                    <form action="{{route("quitarProductoDeCompra")}}" method="post">
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
                <h2>Aquí aparecerán los productos de la compra
                    <br>
                    Escribe el código del producto y presiona Enter</h2>
            @endif
        </div>
    </div>
@endsection
