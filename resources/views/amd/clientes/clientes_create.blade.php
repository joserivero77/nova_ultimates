@extends('layouts.amd')
@section('title'.'Registrar clientes')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1 class="page-title">Registro de cliente<i class="fa fa-user-alt"></i></h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de cliente</h4>
                        @if(session("mensaje"))
        <div class="alert alert-{{session('tipo') ? session("tipo") : "info"}}">
            {{session('mensaje')}}
        </div>
    @endif
                    </div>
                </div>
                {!! Form::open(['route'=>'clientes.store', 'method'=>'post']) !!}
                <div class="form-group">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" name="name" id="name"  aria-describedby="helpId"
                  class="form-control @error('name') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="cedula" class="form-label">Cedula</label>
                  <input type="text" name="cedula" id="cedula"  aria-describedby="helpId"
                  class="form-control @error('cedula') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId">
                  @error('cedula')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="rif" class="form-label">RIF</label>
                    <input type="text" name="rif" id="rif"  aria-describedby="helpId"
                    class="form-control @error('rif') is-invalid
                    @enderror" placeholder="ingrese hasta 11 digitos" aria-describedby="helpId">
                    @error('rif')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="address" class="form-label">Direccion Fiscal</label>
                    <input type="text" name="address" id="address"  aria-describedby="helpId"
                    class="form-control @error('address') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="text" name="phone" id="phone" aria-describedby="helpId"
                    class="form-control @error('phone') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email"  aria-describedby="helpId"
                    class="form-control @error('email') is-invalid
                    @enderror" placeholder="example@gmail.com" aria-describedby="helpId">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                    <small id="helpId" class="form-text text-muted">Este campo es opcional</small>
                </div>



                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')
@endsection
