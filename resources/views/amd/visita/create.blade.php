@extends('layouts.amd')
@section('title'.'Registrar visitas')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Registro de visitas</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('visitas.index') }}">Visitas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar visita</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title">Registro de visita<i class="fa fa-edit"></i></h1>
                    </div>
                </div>
                {!! Form::open(['route'=>'visitas.store', 'method'=>'post']) !!}
                @csrf
                <div class="form-group">
                    <label for="client_id" class="form-label">Cliente</label>
                    <select class="form-control" name="client_id" id="client_id">
                        <option value="">Seleccionar</option>
                        @foreach ($clientes as $client )
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="motivo" class="form-label">Motivo</label>
                  <input type="text" name="motivo" id="motivo"  aria-describedby="helpId" class="form-control" placeholder="" aria-describedby="helpId">
                </div>


                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('visitas.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')

@endsection
