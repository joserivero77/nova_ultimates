@extends('layouts.amd')
@section('title'.'Detalles de Compra')
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
            <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $purchase->name }}</li>
          </ol>
        </nav>
    </div>
        <div class="row">
            <div class=" col-lg-12 ">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12 text-left border-bottom-dark mb-3">
                                <label class="form-control-label"  for="name">Fecha de emision:<p><b>{{ $purchase->purchase_date }}</b></p></label>
                            </div>
                            <div class="col-md-6 text-center">
                                <label class="form-control-label"  for="name">Proveedor</label>
                                <p>{{ $purchase->provider->name }}</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <label class="form-control-label"  for="name">Numero de Compra</label>
                                <p>{{ $purchase->id }}</p>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group row">
                            <h4 class="card-title ml-3">Detalles de compra</h4>
                            <div class="table-responsive col-md-12 border-solid border-current">
                                <table id="Detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio (Bs)</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (Bs)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseDetails as $purchaseDetail )
                                            <tr>
                                                <th>{{ $purchaseDetail->product->name }}</th>
                                                <th>{{ $purchaseDetail->price }}</th>
                                                <th>{{ $purchaseDetail->quantity }}</th>
                                                <th>{{ number_format($purchaseDetail->quantity*$purchaseDetail->price,2) }}</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3"><p align="right">SUBTOTAL</p></th>
                                            <th><p>{{ number_format($subtotal,2) }}</p></th>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th colspan="3"><p align="right">TOTAL IMPUESTO {{ $purchase->tax }}%</p></th>
                                            <th><p>{{ number_format(($subtotal)*($purchase->tax/100),2) }}</p></th>
                                        </tr>
                                        <tr>
                                            <th class="border" colspan="3"><p align="right">TOTAL</p></th>
                                            <th class="border-auto" ><p class="">{{ number_format($purchase->total,2) }}</p></th>
                                        </tr>
                                    </tfoot>

                                </table>

                            </div>
                        </div>



                        <!--div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{ asset('image/'.$purchase->image )}}" class="img-lg " alt="">
                                <h3>{{ $purchase->name }}</h3>

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
                            <a class="dropdown-item" type="button" href="{{ route('purchases.create') }}">Agregar</a>

                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Action</button>

                        </div>
                        </div>
                            <div class="border bottom py-4">
                                <div class="list-group">
                                    <button class="list-group-item list-group-item-action active" type="button">
                                        Sobre purchaseo
                                    </button>
                                    <button class="list-group-item list-group-item-action " type="button">
                                        purchaseos
                                    </button>
                                    <button class="list-group-item list-group-item-action " type="button">
                                        Registrar purchaseos
                                    </button>
                                </div>
                            </div>
                            <div class="py-4">

                                <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $purchase->status }}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $purchase->provider->name }}
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
                            @if ($purchase->status=='ACTIVE')
                            <button class="btn btn-success btn-block">{{ $purchase->status }}</button>
                            @else
                            <button class="btn btn-warning btn-block">{{ $purchase->status }}</button>
                            @endif

                        </div>
                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3>Detalles de compra</h3>
                                    </div>

                                </div>


                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">
                                <div class="form-group col-lg-6">
                                    <strong>
                                        <i class="fab fa-purchase-hunt"></i> Codigo
                                    </strong>
                                        <p class="text-muted">{{ $purchase->code }}</p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-address-card mr-1"></i> Nombre
                                    </strong>
                                        <p class="text-muted">{{ $purchase->name }}</p>
                                    <hr>

                                </div>
                                <div class="form-group col-md-6">
                                    <strong>
                                        <i class="fas fa-map-marked-alt mr-1"></i> Stock
                                    </strong>
                                        <p class="text-muted">{{ $purchase->stock }}</p>
                                    <hr>

                                    <strong>
                                        <i class="fas fa-map-marked-alt mr-1"></i> Precio de venta
                                    </strong>
                                        <p class="text-muted">{{ $purchase->sell_price }}</p>
                                    <hr>


                                    <strong>
                                        <i class="fas fa-address-card mr-1"></i> Proveedor
                                    </strong>
                                        <p class="text-muted">{{ $purchase->provider->name }}</p>
                                    <hr>
                                </div>

                            </div>
                        </div>
                        </div>
                </div>
            </div-->
            <!--div class="card-footer text-muted">
                <a href="{{ route('purchases.index') }}" type="button" class="btn btn-primary float-right">Regresar</a>
            </!--div-->
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')

@endsection
