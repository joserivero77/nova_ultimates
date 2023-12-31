@extends('layouts.amd')
@section('titulo', 'Realizar compra')
@section('stylescss')
    <style>
        .overflow-scroll {
            overflow: auto;
            width: 240px;
            height: 300px;
            border: 2px solid rgb(154, 154, 235);
            border-radius: 5px;
        }

        .card-menos {
            display: none;
        }
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
            <h1><i class="fa fa-cart-plus"></i>Nueva compra </h1>
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
                        <li class="breadcrumb-item"><a href="{{ route('compras.index') }}">Historial de compras</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Comprar</li>
                    </ol>
                </nav>
            </div>

            <div class="dropdown">
                <div class="alert alert-primary" role="alert">
                    <div class="row">
                        <div class=" col-9">
                            <strong>
                                CATALOGO DE PRODUCTOS
                            </strong>
                            <!----------------------------------------------------------------------->
                            <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xl-6 col-xxl-4 col-8">
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar producto"
                                    autocomplete="false">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" onclick="searchProduct()"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="container mb-10">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 col-md-4 col-xl-3 col-xxl-3 col-4">
                                        <!-- Content Wrapper -->
                                        <div class="dropdown open mt-4 ml-5 mr-0">
                                            <a href="#" class=" btn btn-primary dropdown-toggle btn-sm"
                                                data-toggle="dropdown" aria-haspopup="true" type="button" id="triggerId"
                                                aria-expanded="false"><i class="fa fa-shopping-cart"></i>

                                                Car<span class="badge badge-pill badge-danger">{{ $cant }}</span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <div class="row total-header-section">
                                                    @php $total=0 @endphp
                                                    @foreach ((array) session('productosc') as $id => $details)
                                                        @php
                                                            $total += $details['precio_compra'] * $details['cantidad'];
                                                        @endphp
                                                    @endforeach
                                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                        <p>
                                                        <h4>Total:<span class="text-info">Bs {{ $total }}</h3></span>
                                                            </p>
                                                    </div>

                                                    @if (session('productosc'))
                                                        @foreach (session('productosc') as $id => $details)
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
                                                                            class="price text-info"><b>Bs{{ $details['precio_compra'] }}</b></span>
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

        </div>
    </div>
    <div class="col-12">
        <div class="row">
            <!--tarjetas del catalogo-->
            <div class="overflow-scroll">
                <div class="col-lg-12 col-md-3 col-sm-3 col-xl-12 col-xxl-12">
                    @foreach ($prod as $pro)
                        <div class="card text-center justify-center align-content-center align-content-lg-center align-content-xl-between align-content-xxl-between align-content-md-around align-content-sm-start"
                            style="width: 200px">
                            <div class="container align-content-center">
                                <img class="card-img-top img-fluid img_thumbnail"
                                    src="{{ asset('/image') }}/{{ $pro->image }}" alt="Title" title="Categoria"
                                    style="height: 90px;width: 80px;" data-toggle="popover" data-trigger="hover"
                                    data-content="{{ $pro->description }}">
                            </div>
                            <div class="card-body align-content-md-between align-content-sm-between">
                                <h5 class="card-title">{{ $pro->name }}</h5>
                                <p>Codigo:{{ $pro->code }}</p>
                                <p class="card-text text-info"><strong><b>Precio: </b> Bs
                                        {{ $pro->precio_compra }}</strong></p>
                                <div>
                                </div>
                                <div style="align-content: center">
                                    <form action="{{ route('pasarIdc', $pro->code) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <button class="btn btn-primary text-center btn-block btn-sm" type="submit"
                                                name="" value="Agregar" role="button">Agregar al
                                                carrito</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!----Datos del Proveedor------>
            <div class="col-lg-9 col-sm-9 col-md-9 col-xl-9 col-xxl-12 col-12">
                <div class="">
                    <form action="{{ route('terminarOCancelarCompra') }}" method="post" class="needs-validation"
                        novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="id_provider" class="text-info"><b>
                                    <h5>Proveedor</h5>
                                </b></label>
                            <select class="form-control" style=" width:500px" name="id_provider" id="id_provider"
                                required>
                                <option></option>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Debe seleccionar un proveedor</div>
                        </div>
                        @if (session('productosc') !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" id="terminar" type="submit"
                                    class="btn btn-success btn-sm">Terminar
                                    compra
                                </button>
                                <button name="accion" value="cancelar" type="submit"
                                    class="btn btn-danger btn-sm">Cancelar
                                    compra
                                </button>
                            </div>
                        @endif
                    </form>
                </div>

                @if (session('productosc') !== null)
                    <h2>Total: Bs{{ number_format($total, 2) }}</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
                                @foreach (session('productosc') as $producto)
                                    <tr>
                                        <td>{{ $producto->name }}</td>
                                        <td>{{ $producto->description }}</td>
                                        <td>Bs{{ number_format($producto->precio_compra, 2) }}</td>
                                        <td>{{ $producto->cantidad }}</td>
                                        <td>Bs{{ number_format($producto->cantidad * $producto->precio_compra, 2) }}
                                        </td>

                                        <form id="form-{{ $producto->code }}"
                                            action="{{ route('agregarCantidadProductoc', $producto->code) }}"
                                            method="post">
                                            @csrf
                                            <div class="form-group">
                                                <!--label-- for="codigo">Código del producto</!--label-->
                                                <td style="width: 12%">
                                                    <input id="cantidad-{{ $producto->code }}" autocomplete="off"
                                                        value="{{ $producto->cantidad }}" name="cantidad" type="number"
                                                        class="form-control cart_update"
                                                        placeholder="" min="1">
                                                </td>
                                            </div>
                                        </form>


                                        <td>
                                            <form action="{{ route('quitarProductoDeCompra') }}" method="post">
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
                    <h4>Aquí aparecerán los productos de la compra
                        <br>
                        Debe hacer click en Agregar a Carrito
                    </h4>
                @endif
            </div>
        </div>
    </div>

    @include('amd.comprar.modal.catalogo')
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputs = document.querySelectorAll('.cart_update');

            inputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    const form = this.closest('form');
                    form.submit();
                });

                input.addEventListener('change', function() {
                    const form = this.closest('form');
                    form.submit();
                });
            });
        });
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        function searchProduct() {
            var input = document.getElementById('searchInput').value.toLowerCase();
            var products = document.getElementsByClassName('card');

            for (var i = 0; i < products.length; i++) {
                var productName = products[i].getElementsByClassName('card-title')[0].innerText.toLowerCase();
                var productCode = products[i].getElementsByClassName('card-text')[0].innerText.toLowerCase();

                if (productName.includes(input) || productCode.includes(input)) {
                    products[i].style.display = 'block';
                } else {
                    products[i].style.display = 'none';
                }
            }
        }
    </script>
    <script>
        document.getElementById('terminar').addEventListener("click", function() {
            var forms = document.getElementsByClassName("needs-validation");
            var validation = Array.prototype.filter.call(forms, function(form) {
                if (form.checkValidity() === true) {
                    console.log("listo para registrar proveedor");
                } else {
                    console.log("Debe seleccionar un proveedor");
                    alert('ATENCION:Debe selccionar un proveedor');
                }
                form.classList.add("was-validated");
            });

        });
    </script>

    {!! Html::script('js/jquery-3.5.1.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery/jquery.min.js') !!}
    {!! Html::script('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
    {!! Html::script('js/bootstrap.bundle.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery-easing/jquery.easing.min.js') !!}
    {!! Html::script('sbadmin/js/sb-admin-2.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}

@endsection
