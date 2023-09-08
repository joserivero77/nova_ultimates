@extends('layouts.amd')

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

@section('content')
    <div class="container">
        <h1>Listado de Empresas</h1>
        <a href="{{ route('empresas.create') }}" class="btn btn-primary mb-3">Crear Empresa</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->nombre }}</td>
                        <td>
                            @if($empresa->logo)
                                <img src="{{ asset('/storage/logos')}} / {{ $empresa->logo }}" alt="Logo de la Empresa" width="50">
                            @else
                                Sin logo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
