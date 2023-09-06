@extends('layouts.amd')
@section('title'.'Registrar productos')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h4 class="page-title">Registro de productos</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title">Registrar producto<i class="fa fa-vcard"></i></h1>
                    </div>
                </div>
                {!! Form::open(['route'=>'products.store', 'method'=>'post', 'files'=>'true']) !!}
                <!--div-- class="form-group">
                  <label for="code" class="form-label">Codigo</label>
                  <input type="text" name="code" id="code"  aria-describedby="helpId"
                  class="form-control @error('code') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId">
                  @error('code')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </!--div-->
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
                    <label for="description" class="form-label">Descripcion</label>
                    <input type="text" name="description" id="description"  aria-describedby="helpId"
                    class="form-control @error('description') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                  </div>
                  <div class="form-group">
                    <label for="precio_compra" class="form-label">Precio de compra</label>
                    <input type="text" name="precio_compra" id="precio_compra"  aria-describedby="helpId"
                    class="form-control @error('precio_compra') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('precio_compra')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                  </div>
                  <div class="form-group">
                  <label for="precio_venta" class="form-label">Precio de venta</label>
                  <input type="text" name="precio_venta" id="precio_venta"  aria-describedby="helpId"
                  class="form-control @error('precio_venta') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId">
                  @error('precio_venta')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="unit" class="form-label">Unidad de medida</label>
                    <input type="text" name="unit" id="unit"  aria-describedby="helpId"
                    class="form-control @error('unit') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('unit')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                  </div>
                <div class="form-group">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Seleccionar</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="custom-file mb-4">
                    <input type="file" class="custom-file-input" id="picture" name="picture" lang="es">
                    <label for="picture" class="custom-file-label">Seleccionar Archivo</label>
                </div>



                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')

@endsection
