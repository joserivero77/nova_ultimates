@extends('layouts.amd')
@section('title','Paga')
@section('stylescss')
@section('content')
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Venta Nro.</th>
                <th scope="col">Cliente Nro.</th>
                <th scope="col">Pago parcial</th>
                <th scope="col">Tipo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Deuda</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
            <tr>
                <th scope="row">{{$pago->id_venta  }}</th>

                <td>
                {{$pago->deuda }}
                </td>
                <td>{{$pago->description  }}</td>


                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
@section('scripts')
@endsection
