@extends('layouts.amd')
@section('titulo', 'Realizar venta')
@section('stylescss')
<style>
.formulario .vuelto{
    display: inline-block;
}
.formulario .vuelto2{
    display: inline-block;
}
.formulario .resta{
    display: inline-block;
}
.formulario .resta2{
    display: inline-block;
}
.formulario .divis1{
    display: none;
}
.formulario .diviza{
    display: none;
}
.formulario .debito1{ display: none;}
.formulario .debito3{ display: none;}
</style>


@section('content')
    <div>
        <div class="">
            @if (session('success'))
                <div class="alert alert-default-success">
                    {{ session('success') }}
                </div>
            @endif
        @section('content')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1><i class="fa fa-cart-plus"></i>Nueva venta </h1>
            @if (session('mensaje'))
                <div class="alert alert-{{ session('tipo') ? session('tipo') : 'info' }}">
                    {{ session('mensaje') }}
                </div>
            @endif

            <div class="page-header">
                <h3 class="page-title"></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ventas.index') }}">Historial de Ventas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vender</li>
                    </ol>
                </nav>
            </div>

            <div class="dropdown">
                <div class="alert alert-primary" role="alert">
                    <div class="row">
                        <div class=" col-10">
                            <strong>
                                <a href="#" data-toggle="modal" data-target="#catalogomodal"><span
                                        class="">CATALOGO DE PRODUCTOS</span></a>
                            </strong>

                            <!----------------------------------------------------------------------->
                        </div>







                        <div class="col-2">
                            <div class="container mb-3">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 col-md-4 col-xl-3 col-xxl-3 col-4">
                                        <!-- Content Wrapper -->
                                        <div class="dropdown open">
                                            <a href="#" class=" btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" type="button" id="triggerId"
                                                aria-expanded="false"><i class="fa fa-shopping-cart"></i>

                                                Car<span class="badge badge-pill badge-danger">{{ $cant }}</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <div class="row total-header-section">
                                                    @php $total=0 @endphp
                                                    @foreach ((array) session('productos') as $id => $details)
                                                        @php
                                                            $total += $details['precio_venta'] * $details['cantidad'];
                                                        @endphp
                                                    @endforeach
                                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                        <p>
                                                        <h4>Total:<span class="text-info">Bs {{ $total }}</h3></span>
                                                            </p>
                                                    </div>

                                                    @if (session('productos'))
                                                        @foreach (session('productos') as $id => $details)
                                                            <div class="container">
                                                                <div class="row cart-detail">
                                                                    <div
                                                                        class="col-lg-5 col-sm-5 col-5 cart-detail-img p-md-2">
                                                                        <img style="max-width: 50px"
                                                                            src="{{ asset('/image') }}/{{ $details['image'] }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-7 col-sm-7 col-7 cart-detail-product">
                                                                        <p>
                                                                        <h5>{{ $details['name'] }}</h5>
                                                                        </p>
                                                                        <span
                                                                            class="price text-info"><b>Bs{{ $details['precio_venta'] }}</b></span>
                                                                        <div>
                                                                            <span
                                                                                class="count"><b>Cantidad:{{ $details['cantidad'] }}</b></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    @endif

                                                </div>
                                                <div class="row">
                                                    <div
                                                        class="col-lg-12 col-sm-12 col-12 total-section text-center checkout">
                                                        <a href="" class=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <div class="row">

                <!--<div class=" overflow-scroll">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4 col-xxl-4 col-4">
                        @foreach ($prod as $pro)
                            <div class=" card text-center justify-center align-content-center align-content-lg-center align-content-xl-between align-content-xxl-between align-content-md-around align-content-sm-start"
                                style="width: 200px">
                                <div class="container align-content-center">
                                    <img class="card-img-top img-fluid img_thumbnail"
                                        src="{{ asset('/image') }}/{{ $pro->image }}" alt="Title" title="Categoria"
                                        style="height: 80px;width: 80px;" data-toggle="popover" data-trigger="hover"
                                        data-content="{{ $pro->description }}">
                                </div>
                                <div class="card-body align-content-md-between align-content-sm-between">
                                    <h5 class="card-title">{{ $pro->name }}</h5>
                                    <p>Codigo:{{ $pro->code }}</p>
                                    <p class="card-text text-info"><strong><b>Precio: </b> Bs
                                            {{ $pro->precio_venta }}</strong></p>
                                    <div>
                                    </div>
                                    <div style="align-content: center">
                                        <form action="{{ route('pasarId', $pro->code) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <button class="btn btn-primary text-center btn-block" type="submit"
                                                    name="" value="Agregar" role="button">Agregar al
                                                    carrito</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>-->

                <!----Datos del Cliente------>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12 col-xxl-12 col-12">
                    <div class="">
                        <div class=" col-6">
                            <form action="{{ route('terminarOCancelarVenta') }}" method="post" class="needs-validation"
                                novalidate>
                                @csrf
                                <div class="form-group">
                                    <label for="id_cliente">Cliente</label>
                                    <select class="form-control" name="id_cliente" id="id_cliente" required>
                                        <option></option>
                                        @foreach ($clientes as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Debe seleccionar un cliente</div>
                                </div>
                                @if (session('productos') !== null)
                                    <div class="form-group">
                                        <button name="accion" value="terminar" id="terminar" type="submit"
                                            class="btn btn-success">Terminar
                                            venta
                                        </button>
                                        <button name="accion" value="cancelar" type="submit"
                                            class="btn btn-danger">Cancelar
                                            venta
                                        </button>

                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="form-group">
                            @if (session('productos') !== null)
                                <button data-toggle="modal" data-target="#createmodal" class="btn btn-warning">Pagar
                                </button>
                            @endif
                        </div>





                    </div>

                    <!--div class="">
                        <form action="{{ route('agregarProductoVenta') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="codigo">Código del producto</label>
                                <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                       class="form-control"
                                       placeholder="">

                            </div>
                        </form>
                    </!--div-->



                    @if (session('productos') !== null)
                        <h2>Total: Bs{{ number_format($total, 2) }}</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>Incremento</th>
                                        <th></th>
                                        <th>Quitar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('productos') as $producto)
                                        <tr>
                                            <td>{{ $producto->name }}</td>
                                            <td>{{ $producto->description }}</td>
                                            <td>${{ number_format($producto->precio_venta, 2) }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>Bs{{ number_format($producto->cantidad * $producto->precio_venta, 2) }}</td>

                                            <form action="{{ route('agregarCantidadProductov', $producto->code) }}"
                                                method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <!--label-- for="codigo">Código del producto</!--label-->
                                                    <td style="width: 12%">
                                                        <input id="" autocomplete="off" value="1"
                                                            name="cantidad" type="number"
                                                            class="form-control cart_update" placeholder=""
                                                            min="1">
                                                    </td>
                                                    <td style="width: 5%">
                                                        <button type="submit" class="btn btn-warning">
                                                            +
                                                        </button>
                                                    </td>

                                                </div>
                                            </form>


                                            <td>
                                                <form action="{{ route('quitarProductoDeVenta') }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" name="indice" value="{{ $loop->index }}">
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
                            Debe hacer click en Agregar a Carrito
                        </h2>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('amd.vender.modal.pago')
    @include('amd.vender.modal.catalogo')
@endsection
@section('scripts')
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>




        // const content = element.innerHTML;;




        document.getElementById('terminar').addEventListener("click", function() {
            var forms = document.getElementsByClassName("needs-validation");
            var validation = Array.prototype.filter.call(forms, function(form) {
                if (form.checkValidity() === true) {
                    console.log("listo para registrar cliente");
                } else {
                    console.log("Debe seleccionar un cliente");
                    alert('ATENCION: Debe seleccionar un Cliente');
                }
                form.classList.add("was-validated");
            });

        });

        /*document.getElementById('divisa').addEventListener('change', function() {
            var vuelto = document.getElementsByClassName('vuelto');
            console.log('vuelto')
        });*/


        //const consultaDolar = require("consulta-dolar-venezuela");

        /*consultaDolar.getMonitor("BCV", "lastUpdate").then($ => {
            console.log($)
        }); /*Obtener la ultima actualizacion del dólar en BCV*/
    </script>
    {!! Html::script('js/jquery-3.5.1.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery/jquery.min.js') !!}
    {!! Html::script('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
    {!! Html::script('js/bootstrap.bundle.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery-easing/jquery.easing.min.js') !!}
    {!! Html::script('sbadmin/js/sb-admin-2.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}

@endsection
