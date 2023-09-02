@extends('layouts.amd')
@section('title'.'Editar categoria')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Editar categoria</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">>Editar categoria</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar categoria</h4>
                    </div>
                </div>
                {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}"
                    class="form-control @error('name') is-invalid
                    @enderror"
                    placeholder="Nombre"  aria-describedby="helpId">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Descripcion</label>
                    <textarea class="form-control @error('description') is-invalid
                    @enderror" name="description" id="description" rows="3">{{ $category->description }}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary mr-2 btn-sm" style="font-size: 1rem;">Actualizar</button>
                <a href="{{ route('categories.index') }}" class="btn btn-danger btn-sm">Cancelar</a>
            {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('') !!}
@endsection
