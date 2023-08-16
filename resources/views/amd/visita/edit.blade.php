@extends('layouts.amd')
@section('title'.'Edicion de visitas')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Actualizacion de visitas</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('visitas.index') }}">Visitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Actualizacion de visitas</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title"> Actualizar Visita<i class="fa fa-edit"></i></h1>
                    </div>
                </div>
                <h2>Para el cliente:{{ $visita->client->name }}</h2>
                {!! Form::model($visita,['route'=>['visitas.update',$visita], 'method'=>'PUT', 'files'=>'true']) !!}


                <div class="form-group">
                  <label for="motivo" class="form-label">Motivo</label>
                  <input type="text" name="motivo" id="motivo" value="{{ $visita->motivo }}" required aria-describedby="helpId" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Editar</button>
                <a href="{{ route('visitas.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')

@endsection
