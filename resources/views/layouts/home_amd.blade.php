@extends('layouts.app')
@section('styles')
@section('content')
@if (Auth::check())
    <div class="topbar-divider d-none d-sm-block"></div>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <!--a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            <b> </b><img class=" rounded-circle" width="80px;" height="70px;"
                src="{{ asset('img/descarga(33).JPEG') }}">
        </!--a-->
        <!-- Dropdown - User Information -->
        <!--div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </!--div-->
    </li>
@endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body align-content-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Has iniciado sesion!') }}
                        <img class=" rounded-circle" width="280px;" height="270px;"
                src="{{ asset('img/descarga(33).JPEG') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
