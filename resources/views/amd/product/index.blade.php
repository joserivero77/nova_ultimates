@extends('layouts.amd')
@section('title' . 'Gestion de productos')
@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }
    </style>
@endsection
@section('create')
    @if ($message = Session::get('mensaje'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h1 class="page-title"><i class="fa fa-box"></i>Productos</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                    <li class="breadcrumb-item"><a href="{{ route('catalogoproducto.pdf') }}" target="_blanck"><i
                                class="fa fa-file-pdf w-20 h-20 btn-danger shadow"></i>PDF</a></li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class=" col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {{-- <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>

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
                            <a class="dropdown-item" type="button" href="{{ route('products.create') }}">Agregar</a>

                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Action</button>

                        </div>
                        </div>
                    </div> --}}

                    <li class="nav-item d-none d-lg-flex">
                        @if ($categories)
                            @if ($providers)
                                <!--a-- class="nav-link" href="{{ route('products.create') }}" ><span class="btn btn-primary">Registrar producto8</span></!--a-->
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#" data-toggle="modal" data-target="#createmodal"
                                            @disabled(false) class="nav-link"><span
                                                class="btn btn-success">Registrar Producto</span></a>
                                    </div>
                                </div>
                            @else
                                <a class="nav-link disabled" href="{{ route('products.create') }}"
                                    @disabled(true)><span class="btn btn-primary">Registrar producto</span></a>
                                <div class="alert alert-danger">
                                    <p><b>Debe ingresar primero un Proveedor</b></p>
                                </div>
                            @endif
                        @else
                            <a class="nav-link disabled" href="{{ route('products.create') }}"
                                @disabled(true)><span class="btn btn-primary">Registrar producto</span></a>
                            <div class="alert alert-danger">
                                <p><b>Debe ingresar primero una categoria</b></p>
                            </div>
                        @endif
                    </li>



                    <div class="table-responsive">
                        <table table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Stock</th>
                                    <th>Categoria</th>
                                    <th>Estado</th>

                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>

                                        <td>
                                            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td style="height: 20px; width: 138px;">
                                            @if ($product->status == 'ACTIVE')
                                                <a href="{{ route('change_status', $product) }}"
                                                    class=" jsgrig-button jsgrid-edit-button btn btn-success"><small>{{ $product->status }}</small><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                    </svg></a>
                                            @else
                                                <a href="{{ route('change_status', $product) }}"
                                                    class=" jsgrig-button jsgrid-edit-button btn btn-danger"><small>{{ $product->status }}</small><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                                    </svg></a>
                                            @endif
                                        </td>




                                        <td style="width: 150px;">
                                            {!! Form::open(['route' => ['products.destroy', $product], 'method' => 'DELETE']) !!}
                                            <a class="jsgrig-button jsgrid-edit-button btn btn-primary"
                                                href="{{ route('products.edit', $product) }}" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button
                                                class="jsgrig-button jsgrid-delete-button unstyled-button btn btn-danger"
                                                type="submit" title="Eliminar" href="">
                                                <i class="far fa-trash-alt"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                        {{ $products->render() }}
                    </div>

                </div>
            </div>

        </div>
        @include('amd.product.modal.create')
    </div>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="container">
        <div class="dropdown">
            <div class="alert alert-primary col-12" role="alert">
                <div class="row">
                    <strong>
                        CATALOGO DE PRODUCTOS <a href="{{ route('catalogoproducto.pdf') }}" target="_blanck">Exportar
                            PDF</a>
                    </strong>
                    <div class="col-12 align-content-sm-center align-content-md-center">

                        <div class="row"><!--tarjetas del catalogo-->
                            @foreach ($prod as $pro)
                                <div class="col-lg-12 col-md-3 col-sm-4 col-xl-3 col-xxl-3">
                                    <div class="card text-center justify-center align-content-center align-content-lg-center align-content-xl-between align-content-xxl-between align-content-md-around align-content-sm-start"
                                        style="width: 200px">
                                        <div class="container align-content-center">
                                            <img class="card-img-top img-fluid img_thumbnail"
                                                src="{{ asset('/image') }}/{{ $pro->image }}" alt="Title"
                                                title="Categoria" style="height: 120px;width: 120px;" data-toggle="popover"
                                                data-trigger="hover" data-content="{{ $pro->description }}">
                                        </div>
                                        <div class="card-body align-content-md-between align-content-sm-between">
                                            <h5 class="card-title">{{ $pro->name }}</h5>
                                            <p>Codigo:{{ $pro->code }}</p>

                                            <p class="card-text"><strong><b>Precio: </b> Bs
                                                    {{ $pro->precio_venta }}</strong></p>

                                            <div>
                                            </div>
                                            <div style="align-content: center">
                                                <p class="btn-holder">
                                                    <!-- <a href="{{ route('vender.index', $pro->code) }}"
                                                                <a href="{{ route('pasarId', $pro->code) }}"
                                                                class="btn btn-primary text-center btn-block" type="submit"
                                                                name="codigo"
                                                                value="Agregar" role="button">
                                                                Agregar al carrito
                                                            </a>-->
                                                </p>
                                                <form action="{{ route('pasarId', $pro->code) }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <button class="btn btn-primary text-center btn-block"
                                                            type="submit" name="" value="Agregar"
                                                            role="button">Agregar al carrito</button>

                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </div>

@endsection
@section('footer')
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Website 2023</span>
            </div>
        </div>
    </footer>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>

@endsection
