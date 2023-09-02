@extends('layouts.amd')
@section('title'.'Registrar proveedores')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Registro de proveedores</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('providers.index') }}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar proveedor</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title">Registrar proveedor <i class="fa fa-user-alt"></i></h1>
                    </div>
                </div>
                {!! Form::open(['route'=>'providers.store', 'method'=>'post']) !!}
                <div class="form-group">
                  <label for="name" class="form-label">Name</label>
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
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email"  aria-describedby="helpId"
                  class="form-control @error('email') is-invalid
                  @enderror" placeholder="example@gmail.com" aria-describedby="helpId">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="rif" class="form-label">Rif</label>
                  <input type="number" name="rif" id="rif"  aria-describedby="helpId"
                  class="form-control @error('rif') is-invalid
                  @enderror" placeholder=" ingrese hasta 11 digitos" aria-describedby="helpId">
                  @error('rif')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Direccion</label>
                    <input type="text" name="address"  id="address" aria-describedby="helpId"
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
                    <label for="phone" class="form-label">Telefono/Celular</label>
                    <input type="number" name="phone"  id="phone" aria-describedby="helpId"
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


                <button type="submit" class="btn btn-primary mr-2 btn-sm">Registrar</button>
                <a href="{{ route('providers.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')

@endsection
