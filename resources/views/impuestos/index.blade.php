@extends('layouts.amd')

@section('content')
    <h1>Impuestos</h1>
    <!--a href="{{ route('impuestos.create') }}" class="btn btn-primary btn-sm mb-3">Crear Impuesto</!--a-->
    <a href="" data-toggle="modal" data-target="#createmodalImpuesto" class="btn btn-primary btn-sm">Crear Impuesto</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Valor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($impuestos as $impuesto)
                <tr>
                    <td>{{ $impuesto->nombre }}</td>
                    <td>{{ $impuesto->valor }}</td>
                    <td>
                        <a href="{{ route('impuestos.edit', $impuesto) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('impuestos.destroy', $impuesto) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('impuestos.modal.create')

@endsection
