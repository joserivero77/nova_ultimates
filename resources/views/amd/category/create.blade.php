@extends('layouts.amd')
@section('title'.'Registrar categorias')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Registro de Categorias</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">>Registro de Categorias</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Categorias</h4>
                    </div>
                </div>
                {!! Form::open(['route'=>'categories.store', 'method'=>'post']) !!}
                @include('amd.category._form')

                <button type="submit" class="btn btn-primary mr-2" style="font-size: 1rem;">Registrar</button>
                <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')
@endsection
