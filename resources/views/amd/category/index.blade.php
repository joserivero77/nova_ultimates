@extends('layouts.amd')
@section('title'.'Gestion de categorias')
@section('styles')
<style type="text/css">
.unstyled-button
{
    border: none;
    padding: 0;
    background: none;
}
</style>
@endsection

@section('options')

@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h1 class="page-title"><i class="fa fa-book"></i>Categorias</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('amd') }}">Panel Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('imprimir') }}">Categorias</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.pdf') }}" target="_blank"><i class="fa fa-file-pdf w-20 h-20 btn-danger shadow"></i>PDF</a></li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">

<div class="row">
    <div class="col-12">
        <a href="#" data-toggle="modal" data-target="#createmodal" class="nav-link"><span
            class="btn btn-success">Registrar Categoria</span></a>
    </div>
</div>

                    <div class="table-responsive">
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{$category->id  }}</th>

                                    <td>
                                    {{$category->name  }}
                                    </td>
                                    <td>{{$category->description  }}</td>

                                    <td style="width: 150px;">
                                    {!! Form::open(['route'=>['categories.destroy', $category],'method'=>'DELETE'])!!}
                                    <a class="jsgrig-button jsgrid-edit-button btn btn-primary" href="{{ route('categories.edit',$category) }}" title="Editar">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button class="jsgrig-button jsgrid-delete-button unstyled-button btn btn-danger" type="submit" title="Eliminar" href="">
                                        <i class="far fa-trash-alt"></i></button>
                                    {!! Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<div><br><br></div>
@include('amd.category.modal.create')
@endsection
@section('scripts')
{!! Html::script('js/jquery-3.5.1.min.js') !!}
@endsection
