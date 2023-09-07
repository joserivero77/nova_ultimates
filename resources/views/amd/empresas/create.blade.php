@extends('layouts.amd')

@section('content')
    <div class="container">
        <h1>Crear Empresa</h1>

        <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre de la Empresa</label>
                <input type="text" name="nombre" id="nombre"  aria-describedby="helpId"
                class="form-control" placeholder="" aria-describedby="helpId">

              </div>

            <div class="form-group">
                <label for="logo">Logo de la Empresa</label>
                <input type="file" name="logo" id="logo"
                class="form-control-file" placeholder="" aria-describedby="helpId">

            </div>


              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"  aria-describedby="helpId"
                class="form-control" placeholder="example@gmail.com" aria-describedby="helpId">

              </div>
              <div class="form-group">
                <label for="rif" class="form-label">Rif</label>
                <input type="text" name="rif" id="rif"  aria-describedby="helpId"
                class="form-control" placeholder=" ingrese hasta 11 digitos" aria-describedby="helpId">

              </div>
              <div class="form-group">
                  <label for="direccion" class="form-label">Direccion</label>
                  <input type="text" name="direccion"  id="direccion" aria-describedby="helpId"
                  class="form-control" placeholder="" aria-describedby="helpId">


                </div>
                <div class="form-group">
                  <label for="tlf" class="form-label">Telefono/Celular</label>
                  <input type="number" name="tlf"  id="tlf" aria-describedby="helpId"
                  class="form-control @error('tlf') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId">
                @error('tlf')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
              @enderror
                </div>


              <button type="submit" class="btn btn-primary mr-2 btn-sm">Registrar</button>
              <a href="{{ route('empresas.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
        </form>
    </div>
@endsection
