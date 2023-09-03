@extends('layouts.amd')
@section('title', 'Paga')
@section('stylescss')
    <style>
        .formulario .vuelto,
        .formulario .vuelto2,
        .formulario .resta,
        .formulario .resta2,
        .formulario .eq1,
        .formulario .eqBs,
        .formulario .tasa1,
        .formulario .tasa,
        .formulario .divis1,
        .formulario .diviza,
        .formulario .debito1,
        .formulario .debito3,
        .formulario .parcialLabel,
        .formulario .parcialBs,
        .formulario .checkboxLabel,
        .formulario .checkbox1,
        .formulario .diferenciaLabel,
        .formulario .diferencia,
        .formulario .descripcionLabel,
        .formulario .descripcion {
            display: none;
        }

        .formulario .eq1,
        .formulario .eqBs,
        .formulario .tasa1,
        .formulario .tasa,
        .formulario .diferenciaLabel,
        .formulario .diferencia,
        .formulario .descripcionLabel,
        .formulario .descripcion {
            display: block;
        }

        .formulario .parcialLabel,
        .formulario .parcialBs,
        .formulario .checkboxLabel,
        .formulario .checkbox1 {
            display: none;
        }
    </style>
@endsection
@section('content')
    <button data-toggle="modal" data-target="#createmodal" class="btn btn-warning">Pagar</button>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th scope="col">Factura Nro.</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Pago Realizado</th>
                    <th scope="col">Tipo de pago</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Deuda</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->created_at }}</td>
                        <td scope="row">Fact #{{ str_pad($pago->id_venta, 7, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <a href="">{{ $pago->cliente->name }}</a>
                        </td>
                        <td>{{ $pago->pago_parcial }}</td>
                        <td>{{ $pago->tipo }}</td>
                        <td>{{ $pago->description }}</td>
                        <td>{{ $pago->deuda }}</td>
                        <td>{{ $pago->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('amd.pagos.create')
@endsection
@section('scripts')
    {!! Html::script('js/jquery-3.5.1.min.js') !!}
    {!! Html::script('js/bootstrap.bundle.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery-easing/jquery.easing.min.js') !!}
    {!! Html::script('sbadmin/js/sb-admin-2.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
@endsection
