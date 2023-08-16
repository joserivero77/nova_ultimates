@extends('layouts.amd')
@section('title'.'Gestion de compras')
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
@section('create')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Compras</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                <!--div class="card-body">
                    <div-- class="d-flex justify-content-between">
                        <h4 class="card-title">Compras</h4>

                        <div class="btn-group">
                            <h4 class="card-title">
                                <a href="">
                                    <i class="fas fa-download"></i>
                                    Exportar
                                </a>
                            </h4>
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" type="button" href="{{ route('purchases.create') }}">Agregar</a>

                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Action</button>

                        </div>
                        </div>
                    </div-->
                    <li class="nav-item d-none d-lg-flex">
                        @if ($products)
                            @if($providers)
                                <a class="nav-link" href="{{ route('purchases.create') }}" ><span class="btn btn-primary">Registrar Compra</span></a>
                            @else
                                <a class="nav-link disabled" href="{{ route('purchases.create') }}" ><span class="btn btn-primary">Registrar Compra</span></a>
                                <div class="alert alert-danger">
                                    <p><b>Debe ingresar primero un Proveedor</b></p>
                                </div>
                            @endif
                        @else
                                <a class="nav-link disabled" href="{{ route('livewire.purchases.create') }}" ><span class="btn btn-primary">Registrar Compra</span></a>
                                <div class="alert alert-danger">
                                    <p><b>Debe ingresar primero un producto</b></p>
                                </div>
                        @endif
                    </li>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width: 140px">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchases as $purchase)
                                <tr >
                                    <th scope="row">
                                    <a href="{{ route('purchases.show', $purchase)  }}">{{$purchase->id}}</a>
                                    </th>
                                    <th scope="row">{{$purchase->purchase_date}}</th>
                                    <th scope="row">{{$purchase->total}}</th>
                                    <td style="width: 150px; height: 10px;"><a class=" jsgrig-button jsgrid-edit-button btn btn-success"><small>{{$purchase->status }}</small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                      </svg></a>
                                      </td>


                                    <td style="width: 150px;">
                                    {!! Form::open(['route'=>['purchases.destroy', $purchase],'method'=>'DELETE'])!!}
                                    <!--a class="jsgrig-button jsgrid-edit-button" href="{{ route('purchases.edit',$purchase) }}" title="Editar">
                                        <i class="far fa-edit"></i>
                                    </!--a-->
                                    <!--button class="jsgrig-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar" href="">
                                        <i class="far fa-trash-alt"></i></!--button-->

                                   <a href="{{ route('purchases.index', $purchase)  }}" class="jsgrid-button jsgrid-edit-button btn btn-danger">
                                    <i class="far fa-file-pdf"></i>
                                   </a>
                                   <!--a href="{{ route('purchases.show', $purchase)  }}" class="jsgrid-button jsgrid-edit-button btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                   </a-->
                                   <a href="{{ route('purchases.show', $purchase)  }}" class="btn btn-success jsgrid-button jsgrid-edit-button">
                                    <i class="far fa-eye"></i>
                                   </a>


                                        {!! Form::close()!!}
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>
                        {{-- $purchases->render() --}}
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<div><br><br></div>
@endsection
@section('scripts')

@endsection
