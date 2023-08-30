@extends("layouts.amd")
@section("titulo", "Compras")
@section('stylescss')
@section("content")
    <div class="content-wrapper">
        <div class="page-header">
            <h1 class="page-title"><i class="fa fa-list"></i>Compras Realizadas</h1>
            @if(session("mensaje"))
                <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
                    {{session('mensaje')}}
                </div>
                @endif
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('comprar.index') }}">Comprar</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compras Realizadas</li>
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
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Proveedor</th>
                                        <th>Total</th>
                                        <th>Cant. Comprada</th>
                                        <th style="width: 100px">Opciones</th>
                                        <th></th>
                                        <th></th>

                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach($compras as $compra)
                        <tr>
                            <td>{{ $compra->id }}</td>
                            <td>{{date_format($compra->created_at,'d/m/y')}}</td>
                            <td>{{$compra->provider->name}}</td>
                            <td>Bs{{number_format($compra->total, 2)}}</td>
                            <td>{{number_format($compra->cante)}}</td>
                            <td style="width: 50px">
                                <a class="btn btn-info btn-sm" href="">
                                    <i class="fa fa-print"></i>
                                </a>
                            </td>
                            <td style="width: 20px">
                                <a class="btn btn-success btn-sm" href="{{route("compras.show", $compra)}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            <td style="width: 20px">
                                <form action="{{route("compras.destroy", [$compra])}}" method="post">
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
    </div>
@endsection
@section('scripts')

@endsection

