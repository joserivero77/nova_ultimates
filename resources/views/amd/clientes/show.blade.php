@extends('layouts.amd')
@section('title'.'Informacion de Clientes')
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
            <h3 class="page-title">{{ $client->name }}</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cliente</li>
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
                                <h1>{{ $client->name }}<i class="fa fa-warehouse"></i></h1>

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
                            <a class="dropdown-item" type="button" href="{{ route('clients.create') }}">Agregar</a>

                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Action</button>

                        </div>
                        </div-->
                            <div class="border bottom py-4">
                                <div class="list-group">
                                    <button class="list-group-item list-group-item-action active" type="button">
                                        Sobre Cliente
                                    </button>
                                    <button class="list-group-item list-group-item-action " type="button">
                                        Historial de Compras
                                    </button>
                                    <button class="list-group-item list-group-item-action " type="button">
                                        Registrar Productos
                                    </button>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3>Informacion de Cliente</h3>
                                    </div>

                                </div>


                        <div class="profile-feed">
                            <div class="d-flex align-items-start profile-feed-item">
                                <div class="form-group col-lg-6">
                                    <strong>
                                        <i class="fab fa-product-hunt"></i> Nombre
                                    </strong>
                                        <p class="text-muted">{{ $client->name }}</p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-address-card mr-1"></i> Cedula Nro.
                                    </strong>
                                        <p class="text-muted">{{ $client->cedula }}</p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-address-card mr-1"></i> RIF
                                    </strong>
                                        <p class="text-muted">{{ $client->rif }}</p>
                                    <hr>
                                </div>
                                <div class="form-group col-md-6">
                                    <strong>
                                        <i class="fas fa-phone-alt mr-1"></i> Telefono
                                    </strong>
                                        <p class="text-muted">{{ $client->phone }}</p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-envelope mr-1"></i> Correo
                                    </strong>
                                        <p class="text-muted">{{ $client->email }}</p>
                                    <hr>
                                    <strong>
                                        <i class="fas fa-map-marked-alt mr-1"></i> Direccion
                                    </strong>
                                        <p class="text-muted">{{ $client->address }}</p>
                                    <hr>
                                </div>

                            </div>
                        </div>
                        </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <a href="{{ route('clients.index') }}" type="button" class="btn btn-primary float-right">Regresar</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')

@endsection
