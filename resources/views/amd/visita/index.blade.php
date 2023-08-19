@extends('layouts.amd')
@section('title'.'Gestion de visitas')
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
        <h1 class="page-title"><i class="fa fa-warehouse"></i>Registro de Visitas</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visitas</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <li class="nav-item d-none d-lg-flex">
            @if ($clients)
                <a class="nav-link" href="{{ route('visitas.create') }}"><span class="btn btn-primary">Registrar Visita</span></a>
            @else
                <a class="nav-link disabled" href="{{ route('visitas.create') }}"><span class="btn btn-primary">Registrar Visita</span></a>
                    <div class="alert alert-danger">
                        <p><b>Debe ingresar primero un cliente</b></p>
                    </div>
            @endif
        </li>

        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">

                    <div class="table-responsive">
                        <table table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                            <thead>
                                <tr>

                                    <th>Fecha de la visita</th>
                                    <th>Cliente</th>
                                    <th>Motivo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visitas as $visita)
                                <tr>
                                    <th scope="row">{{date_format($visita->created_at,'d/m/y')}}</th>

                                    <td>
                                    <a href="{{ route('clients.show',$visita->client) }}">{{$visita->client->name  }}</a>
                                    </td>
                                    <td>{{ $visita->motivo }}</td>


                                    <td style="width: 150px;">
                                    {!! Form::open(['route'=>['visitas.destroy', $visita],'method'=>'DELETE'])!!}
                                    <a class="jsgrig-button jsgrid-edit-button btn btn-primary" href="{{ route('visitas.edit',$visita) }}" title="Editar">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button class="jsgrig-button jsgrid-delete-button unstyled-button btn btn-danger" type="submit" title="Eliminar" href="">
                                        <i class="far fa-trash-alt"></i></button>
                                    {!! Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>
                        {{ $visitas->render() }}
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<div><br><br></div>

@endsection
@section('scripts')

@endsection
