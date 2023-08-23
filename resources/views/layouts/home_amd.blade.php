@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <img class=" rounded-circle" width="400px;" height="400px;"
                                src=" {{ asset('img/dnova.png') }} ">
                            </div>

                        </div>
                    </div>

                </div>

@endsection
@section('scripts')

@endsection
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <b>.  </b><img class=" rounded-circle" width="80px;" height="70px;"
                                    src=" {{ asset('img/descarga(33).JPEG') }} ">
                            </a>
