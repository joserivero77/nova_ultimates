@extends('layouts.amd')

@section('content')
    <h1>Editar Impuesto</h1>
    <form action="{{ route('impuestos.update', $impuesto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $impuesto->nombre }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ $impuesto->valor }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
