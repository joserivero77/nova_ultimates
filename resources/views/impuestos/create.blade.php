@extends('layouts.amd')

@section('content')
    <h1>Crear Impuesto</h1>
    <form action="{{ route('impuestos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
