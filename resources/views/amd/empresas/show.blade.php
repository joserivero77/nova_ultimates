@extends('layouts.amd')

@section('content')
    <div class="container">
        <h1>Detalles de la Empresa</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $empresa->nombre }}</h5>
                <p class="card-text">Logo:</p>
                @if($empresa->logo)
                    <img src="{{ asset('/img/imagenes',$empresa->logo) }}" alt="Logo de la Empresa" width="200">
                @else
                    Sin logo
                @endif
            </div>
        </div>

        <a href="{{ route('empresas.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection
