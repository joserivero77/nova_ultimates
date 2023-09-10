@extends('layouts.amd')

@section('content')
    <h1>Crear Impuesto</h1>
    <form action="{{ route('impuestos.store') }}" method="POST">
        @csrf
        <label for="">Nombre</label>
        <div class="input-group mb-3">

            <span class="input-group-text badge-success" id="addon-wrapping"><i class="fa fa-address-card" aria-hidden="true"></I></span>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <label for="">Impuesto</label>
        <div class="input-group mb-3">

            <span class="input-group-text badge-success" id="inputGroup-sizing-default"><i class="fa fa-archive"></i></span><input
            type="text" name="valor" id="valor" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('impuestos.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
