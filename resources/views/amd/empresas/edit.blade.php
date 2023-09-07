@extends('layouts.amd')

@section('content')
    <div class="container">
        <h1>Editar Empresa</h1>

        <form action="{{ route('empresas.update', $empresa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre de la Empresa</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $empresa->nombre }}" >
            </div>

            <div class="form-group">
                <label for="logo">Logo de la Empresa</label>
                <input type="file" name="logo" id="logo" class="form-control-file">
            </div>



              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"  aria-describedby="helpId"
                class="form-control" value="{{ $empresa->email }}" placeholder="example@gmail.com" aria-describedby="helpId">

              </div>
              <div class="form-group">
                <label for="rif" class="form-label">Rif</label>
                <input type="text" name="rif" id="rif"  aria-describedby="helpId"
                class="form-control" value="{{ $empresa->rif }}" placeholder=" ingrese hasta 11 digitos" aria-describedby="helpId">

              </div>
              <div class="form-group">
                  <label for="direccion" class="form-label">Direccion</label>
                  <input type="text" name="direccion"  id="direccion" aria-describedby="helpId"
                  class="form-control" value="{{ $empresa->direccion }}" placeholder="" aria-describedby="helpId">


                </div>
                <div class="form-group">
                  <label for="tlf" class="form-label">Telefono/Celular</label>
                  <input type="number" name="tlf"  id="tlf" aria-describedby="helpId"
                  class="form-control @error('tlf') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId" value="{{ $empresa->tlf }}">
                @error('tlf')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
              @enderror
                </div>


            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
