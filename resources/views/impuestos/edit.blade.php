@extends('layouts.amd')

@section('content')
    <h1>Editar Impuesto</h1>
    <form action="{{ route('impuestos.update', $impuesto) }}" method="POST"class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <label for="validation">Nombre</label>
        <div class="input-group mb-3">

            <span class="input-group-text badge-success" id="addon-wrapping"><i class="fa fa-address-card" aria-hidden="true"></I></span>
            <input type="text" name="nombre" id="validation" class="form-control" value="{{ $impuesto->nombre }}">
        </div>
        <label for="valor">Valor</label>
        <div class="input-group mb-3">

            <span class="input-group-text badge-success" id="inputGroup-sizing-default"><i class="fa fa-archive"></i></span>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ $impuesto->valor }}">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
        <a href="{{ route('impuestos.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
    </form>
@endsection
