@extends('layouts.amd')
@section('title'.'Edicion de productos')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edicion de productos</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edicion de productos</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title">Editar producto<i class="fa fa-edit"></i></h1>
                    </div>
                </div>

                {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT', 'files'=>'true']) !!}
                <!--div-- class="form-group">
                    <label for="code" class="form-label">Codigo</label>
                    <input type="text" name="code" id="code" value="{{ $product->code }}"
                     aria-describedby="helpId" class="form-control @error('code') is-invalid
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
                  <input type="text" name="name" id="name" value="{{ $product->name }}"
                   aria-describedby="helpId" class="form-control @error('name') is-invalid
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
                    <input type="text" name="description" id="description" value="{{ $product->description }}"
                     aria-describedby="helpId" class="form-control @error('description') is-invalid
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
                    <input type="number" name="purchase_price" id="precio_compra" value="{{ $product->precio_compra }}"
                    aria-describedby="helpId" class="form-control @error('precio_compra') is-invalid
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
                  <input type="number" name="precio_venta" id="precio_venta" value="{{ $product->precio_venta }}"
                  aria-describedby="helpId" class="form-control @error('precio_venta') is-invalid
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
                    <input type="text" name="unit" id="unit" value="{{ $product->unit }}"
                    aria-describedby="helpId" class="form-control @error('unit') is-invalid
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

                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}"
                            @if ($category->id_category == $product->category_id)
                                selected
                            @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="custom-file mb-4">
                    <input type="file" value="{{ $product->image }}" class="custom-file-input dropify" id="picture" name="picture">
                    <label for="picture" class="custom-file-label">Seleccionar para cambiar la imagen: {{ $product->image }}</label>

                </div>





                <button type="submit" class="btn btn-primary mr-2">Editar</button>
                <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')


<script>
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().replace(/.*\\/, '');
            $(this).next('.custom-file-label').html(fileName);
        });
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropify/4.3.0/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
    </script>
@endsection
