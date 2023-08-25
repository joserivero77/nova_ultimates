@extends('layouts.amd')
@section('title' . 'Informacion de Productos')
@section('styles')


@endsection
@section('create')

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ventas.index') }}">Historial
                            de ventas</a></li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class=" col-lg-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{ asset('image/' . $product->image) }}" class="img-lg " alt=""
                                        style="height: 150px; width: 150px">
                                    <h3>{{ $product->name }}</h3>

                                    <!--div class="d-flex justify-content-between">
                            </!--div-->
                                </div>
                                <!--h4 class="card-title">
                                    <a href="">
                                        <i class="fas fa-download"></i>
                                        Exportar
                                    </a>
                                </!--h4-->
                                <!--a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="fas fa-ellipsis-v"></i>
                            </!--a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" type="button" href="{{ route('products.create') }}">Agregar</a>

                                <button class="dropdown-item" type="button">Action</button>
                                <button class="dropdown-item" type="button">Action</button>

                            </div>
                            </div-->
                                <!--div-- class="border bottom py-4">
                                    <div class="list-group">
                                        <button class="list-group-item list-group-item-action active" type="button">
                                            Sobre Producto
                                        </button>
                                        <button class="list-group-item list-group-item-action " type="button">
                                            Productos
                                        </button>
                                        <button class="list-group-item list-group-item-action " type="button">
                                            Registrar Productos
                                        </button>
                                    </div>
                                </!--div-->
                                <div class="py-4">

                                    <p class="clearfix">
                                        <span class="float-left">
                                            Status
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $product->status() }}
                                        </span>
                                    </p>

                                    <p class="clearfix">
                                        <span class="float-left">
                                            Categoria
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $product->category->name }}
                                        </span>
                                    </p>
                                </div>
                                @if ($product->status == 'ACTIVE')
                                    <a href="{{ route('change_status', $product) }}"
                                        class="btn btn-success btn-block">Activo</a>
                                @else
                                    <a href="{{ route('change_status', $product) }}"
                                        class="btn btn-danger btn-block">Desactivado</a>
                                @endif

                            </div>
                            <div class="col-lg-8 pl-lg-5 mt-5 ml-0">
                                <div class="d-flex justify-content-between">
                                    <div class="col-lg-12 text-center">
                                        <p class=" text-center pb-4">
                                            <b>
                                                <h3>Informacion de Producto</h3>
                                            </b>
                                        </p>

                                    </div>

                                </div>


                                <div class="profile-feed">
                                    <div class="d-flex align-items-start profile-feed-item">
                                        <div class="form-group col-lg-6 mt-3">
                                            <strong>
                                                <i class="fab fa-product-hunt"></i> Codigo
                                            </strong>
                                            <p class="text-muted">{{ $product->code }}</p>
                                            <hr>
                                            <strong>
                                                <i class="fas fa-address-card mr-1"></i> Nombre del producto
                                            </strong>
                                            <p class="text-muted">{{ $product->name }}</p>
                                            <hr>

                                        </div>
                                        <div class="form-group mt-3 col-md-6">
                                            <strong>
                                                <i class="fas fa-map-marked-alt mr-1"></i> Stock
                                            </strong>
                                            <p class="text-muted">{{ $product->stock }}</p>
                                            <hr>

                                            <strong>
                                                <i class="fas fa-map-marked-alt mr-1"></i> Precio de venta
                                            </strong>
                                            <p class="text-muted">{{ $product->precio_venta }}</p>
                                            <hr>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="card-footer text-muted">
                        <a href="{{ route('products.index') }}" type="button"
                            class="btn btn-primary float-right">Regresar</a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
