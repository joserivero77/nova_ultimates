@extends('layouts.amd')
@section('title'.'Detalles de Venta')
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
            <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $sale->name }}</li>
          </ol>
        </nav>
    </div>
        <div class="row">
            <div class=" col-lg-12 ">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12 text-left border-bottom-dark mb-3">
                            <label class="form-control-label"  for="name">Fecha de emision:<p><b>{{ $sale->sale_date }}</b></p></label>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 text-center">
                                <label class="form-control-label"  for="name">Cliente</label>
                                <p><a href="{{ route('clients.show',$sale->client) }}">{{ $sale->client->name }}</a></p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-control-label"  for="name">Vendedor</label>
                                <p>{{ $sale->user->name }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-control-label"  for="name">Numero de Venta</label>
                                <p>{{ $sale->id }}</p>
                            </div>
                        </div>


                        <br><br>
                        <div class="form-group row  col-md-auto">
                            <h4 class="card-title ml-3">Detalles de Venta</h4>
                            <div class="table-responsive col-md-12">
                                <table id="Detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio (Bs)</th>
                                            <th>Descuento</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (Bs)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($saleDetails as $saleDetail )
                                            <tr>
                                                <th>{{ $saleDetail->product->name }}</th>
                                                <th>{{ $saleDetail->price }}</th>
                                                <th>{{ $saleDetail->discount }}</th>
                                                <th>{{ $saleDetail->quantity }}</th>
                                                <th>{{ number_format($saleDetail->quantity*$saleDetail->price-($saleDetail->discount/100),2) }}</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4"><p align="right">SUBTOTAL</p></th>
                                            <th align="right"><p>{{ number_format($subtotal,2) }}</p></th>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th colspan="4"><p align="right">TOTAL IMPUESTO ({{ $sale->tax }})%</p></th>
                                            <th align="right"><p>{{ number_format(($subtotal)*($sale->tax/100),2) }}</p></th>
                                        </tr>
                                        <tr>
                                            <th  colspan="4"><p align="right">TOTAL</p></th>
                                            <th class="border-bottom-dark" align="right"><p>{{ number_format($sale->total,2) }}</p></th>
                                        </tr>
                                    </tfoot>

                                </table>

                            </div>
                        </div>



                        <!--div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{ asset('image/'.$sale->image )}}" class="img-lg " alt="">
                                <h3>{{ $sale->name }}</h3>

                        <div class="d-flex justify-content-between">
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
                            <a class="dropdown-item" type="button" href="{{ route('sales.create') }}">Agregar</a>

                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Action</button>

                        </div>
                        </div>
                            <div class="border bottom py-4">
                                <div class="list-group">
                                    <button class="list-group-item list-group-item-action active" type="button">
                                        Sobre saleo
                                    </button>
                                    <button class="list-group-item list-group-item-action " type="button">
                                        saleos
                                    </button>
                                    <button class="list-group-item list-group-item-action " type="button">
                                        Registrar saleos
                                    </button>
                                </div>
                            </div>
                            <div class="py-4">

                                <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $sale->status }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Cliente
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $sale->client->name }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoria
                                    </span>
                                    <span class="float-right text-muted">

                                    </span>
                                </p>
                            </div>
                            @if ($sale->status=='ACTIVE')
                            <button class="btn btn-success btn-block">{{ $sale->status }}</button>
                            @else
                            <button class="btn btn-warning btn-block">{{ $sale->status }}</button>
                            @endif

                        </div>
                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3>Detalles de Venta</h3>
                                    </div>

                                </div>


                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">
                                <div class="form-group col-lg-6">
                                    <strong>
                                        <i class="fab fa-sale-hunt"></i> Codigo
                                    </strong>
                                        <p class="text-muted">{{ $sale->code }}</p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-address-card mr-1"></i> Nombre
                                    </strong>
                                        <p class="text-muted">{{ $sale->name }}</p>
                                    <hr>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>
                                        <i class="fas fa-map-marked-alt mr-1"></i> Stock
                                    </strong>
                                        <p class="text-muted">{{ $sale->stock }}</p>
                                    <hr>

                                    <strong>
                                        <i class="fas fa-map-marked-alt mr-1"></i> Precio de venta
                                    </strong>
                                        <p class="text-muted">{{ $sale->sell_price }}</p>
                                    <hr>


                                    <strong>
                                        <i class="fas fa-address-card mr-1"></i> Cliente
                                    </strong>
                                        <p class="text-muted">{{ $sale->client->name }}</p>
                                    <hr>
                                </div>

                            </div>
                        </div>
                        </div>
                </div>
            </div-->
            <div class="card-footer text-muted">
                <a href="{{ route('sales.index') }}" type="button" class="btn btn-primary float-right">Regresar</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')

@endsection
