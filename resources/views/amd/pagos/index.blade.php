@extends('layouts.amd')
@section('title','Paga')
@section('stylescss')
    <style>
        .formulario .vuelto {
            display: inline-block;
        }

        .formulario .vuelto2 {
            display: inline-block;
        }

        .formulario .resta {
            display: inline-block;
        }

        .formulario .resta2 {
            display: inline-block;
        }

        .formulario .divis1 {
            display: none;
        }

        .formulario .diviza {
            display: none;
        }

        .formulario .debito1 {
            display: none;
        }

        .formulario .debito3 {
            display: none;
        }

        .formulario .eq1 {
            display: inline-block;
        }

        .formulario .eqBs {
            display: inline-block;
        }

        .formulario .parcialLabel {
            display: :none;
        }

        .formulario .parcialBs {
            display: none;
        }

        .formulario .checkboxLabel {
            display: none;
        }

        .formulario .checkbox1 {
            display: none;
        }

        .formulario .tasa1 {
            display: block;
        }

        .formulario .tasa {
            display: block;
        }

        .formulario .diferenciaLabel {
            display: none;
        }

        .formulario .diferencia {
            display: none;
        }

        .formulario .descripcionLabel {
            display: none;
        }

        .formulario .descripcion {
            display: none;
        }
    </style>
@section('content')
<button data-toggle="modal" data-target="#createmodal" class="btn btn-warning">Pagar</button>
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


        </tbody>
    </table>
</div>
@include('amd.pagos.create')
@endsection
@section('scripts')
<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        // const content = element.innerHTML;;


        /*document.getElementById('divisa').addEventListener('change', function() {
            var vuelto = document.getElementsByClassName('vuelto');
            console.log('vuelto')
        });*/


        //const consultaDolar = require("consulta-dolar-venezuela");

        /*consultaDolar.getMonitor("BCV", "lastUpdate").then($ => {
            console.log($)
        }); /*Obtener la ultima actualizacion del dólar en BCV*/
    </script>
    {!! Html::script('js/jquery-3.5.1.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery/jquery.min.js') !!}
    {!! Html::script('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
    {!! Html::script('js/bootstrap.bundle.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery-easing/jquery.easing.min.js') !!}
    {!! Html::script('sbadmin/js/sb-admin-2.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}

@endsection
