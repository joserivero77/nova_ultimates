@extends("layouts.amd")
@section("titulo", "Ventas del dia")
@section('stylescss')
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h1 class="page-title"><i class="fa fa-list"></i>Reporte Ventas del dia</h1>
        @if(session("mensaje"))
            <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
                {{session('mensaje')}}
            </div>
            @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('ventas.index') }}">Historial de ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte ventas del dia</li>
          </ol>
        </nav>
    </div>
<div class="row">
    <div class="col-12 col-md-6 text-center">
        <span>Fecha de Consulta <b></b></span>
        <div class="form-group">
            <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong>
        </div>
    </div>
    <div class="col-12 col-md-6 text-center">
        <span>Cantidad de Registros <b></b></span>
        <div class="form-group">
            <strong>{{ $ventas->count() }}</strong>
        </div>
    </div>
</div>

    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="table-responsive">
                        <table table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                            <thead>
                                <tr>

                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Cant. Vendida</th>
                                    <th style="width: 100px">Opciones</th>
                                    <th></th>
                                    <th></th>


                                </tr>

                            </thead>
                            <tbody>
                                @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->id }}</td>
                                    <td>{{date_format($venta->created_at,'d/m/y')}}</td>
                                    <td>{{$venta->cliente->name}}</td>
                                    <td>Bs{{number_format($venta->totalfinal, 2)}}</td>
                                    <td>{{number_format($venta->vent)}}</td>
                                    <td style="margin-left: 50px">

                                    </td>
                                    <td style="width: 20px">

                                    </td>
                                    <td style="width: 20px">

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>

@endsection
@section('scripts')

@endsection
