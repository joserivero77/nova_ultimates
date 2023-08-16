@extends('layouts.amd')
@section('title'.'Gestion de ventas')
@section('styles')
<style type="text/css">
.unstyled-button
{
    border: none;
    padding: 0;
    background: none;
}
</style>
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
        <h3 class="page-title">Ventas</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <li class="nav-item d-none d-lg-flex">
            @if ($products)
                @if($client)

                @else
                        <a class="nav-link disabled" href="{{ route('sales.create') }}"><span class="btn btn-primary">Registrar Venta</span></a>
                    <div class="alert alert-danger">
                        <p><b>Debe ingresar primero un cliente</b></p>
                    </div>
                @endif
            @else
                    <a class="nav-link disabled" href="{{ route('sales.create') }}"><span class="btn btn-primary">Registrar Venta</span></a>
                    <div class="alert alert-danger">
                        <p><b>Debe ingresar primero un producto</b></p>
                    </div>
            @endif
        </li>
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">

                    <div class="table-responsive">
                        <table  class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><h3><b>CATALOGO DE PRODUCTOS</b></h3></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>
                <div class="row"><!--tarjetas del catalogo-->
                    @foreach ($prod as $pro )
                    <div class="col-2">
                        <div class="card text-center justify-center" style="width: 200px">
                            <div class="container align-content-center">
                                <img class="card-img-top img-fluid img_thumbnail"
                                src="{{ asset('/image') }}/{{ $pro->image }}"
                                alt="Title"
                                title="Categoria"
                                style="height: 120px;width: 120px;"
                                data-toggle="popover"
                                data-trigger="hover"
                                data-content="{{ $pro->description }}">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $pro->name }}</h5>
                                <p>Codigo:{{ $pro->code }}</p>
                                <p class="card-text"><strong><b>Precio: </b> Bs {{ $pro->price }}</strong></p>
                            <div>
                            </div><br>
                                        <div  style="align-content: center">
                                            <p class="btn-holder">
                                                <a href="{{ route('vender.index',$pro->id) }}"
                                                    class="btn btn-primary text-center btn-block" type="submit"
                                                    name=""
                                                    value="Agregar" role="button">
                                                    Agregar al carrito
                                                </a>
                                            </p>
                                        </div>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<div><br><br></div>
@endsection
@section('scripts')

@endsection
