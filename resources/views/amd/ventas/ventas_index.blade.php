@extends("layouts.amd")
@section("titulo", "Ventas")
@section('stylescss')
@section("content")
<div class="content-wrapper">
    <div class="page-header">
        <h1 class="page-title"><i class="fa fa-list"></i>Ventas Realizadas</h1>
        @if(session("mensaje"))
            <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
                {{session('mensaje')}}
            </div>
            @endif
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item " aria-current="page"><a href="{{ route('vender.index') }}">Vender</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas Realizadas</li>
                <li class="breadcrumb-item " aria-current="page"><a href="{{ route('reporte.dia') }}">Reporte del dia</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('reporte.fecha') }}">Reporte por rango de fecha</a></li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="table-responsive">
                        <table table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                            <thead>
                                <tr>

                                    <th>Factura Nro</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Cant. Vendida</th>
                                    <th>Estado</th>
                                    <th style="width: 100px">Opciones</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach($ventas as $venta)
                                <tr>
                                    <td>{{ str_pad($venta->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{date_format($venta->created_at,'d/m/y')}}</td>
                                    <td>{{$venta->cliente->name}}</td>
                                    <td>Bs{{number_format($venta->totalfinal, 2)}}</td>
                                    <td>{{number_format($venta->vent)}}</td>
                                    <td>
                                        @if ($venta->estado === 'ACTIVA')
                                            <form action="{{ route('ventas.anular', $venta->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-primary btn-sm" type="submit">Anular</button>
                                            </form>
                                        @else
                                            Venta anulada
                                        @endif
                                    </td>
                                    <td style="margin-left: 50px">
                                        <a class="btn btn-info btn-sm" href="{{ route('ventas_pdf', $venta->id) }}" target="_blank" method="get">
                                            <i class="fa fa-print"></i>
                                        </a>

                                    </td>
                                    <td style="width: 20px">
                                        <a class="btn btn-success btn-sm" href="{{route("ventas.show", $venta)}}">
                                            <i class="fa fa-info"></i>
                                        </a>
                                    </td>
                                    <td style="width: 20px">
                                        <form action="{{route("ventas.destroy", [$venta])}}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
