@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sistema de gestion de Ventas') }}</div>

                <div class="card-body justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-6 justify-content-between">
                                <img class=" rounded-circle" width="300px;" height="300px;"
                                src=" {{ asset('img/dnova.png') }} ">
                            </div>

                        </div>
                    </div>

                </div>
                @auth
                <div class="container">
                    <div class="row">
                        <div class="col-12 justify-content-center">
                            <p><h2 class="text-center">Bienvenido!</h2></p>

                        </div>
                    </div>
                </div>

                @endauth
                @guest
                    <p>Debe iniciar sesion</p>
                @endguest

@endsection
@section('scripts')

@endsection
