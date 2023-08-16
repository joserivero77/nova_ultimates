@extends('layouts.amd')
@section('stylescss')

@stop
<div>
@section('content')
<div class="container pb-3 mt-n2 mt-md-n3">
    <div class="row">
        <div class="col-xl-5 col-md-4 pt-3 pt-md-0">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                <span><b>CATALOGO DE PRODUCTOS</b></span></h2>


                <div class="container">
                    <div class="row"><!--tarjetas del catalogo-->
                        @foreach ($prod as $pro )
                        <div class="col-5">
                            <div class="card text-center justify-center" style="width: 200px">
                                <div class="container align-content-center">
                                    <img class="card-img-top img-fluid img_thumbnail"
                                    src="{{ asset('/image') }}/{{ $pro->image }}"
                                    alt="Title"
                                    title="Categoria"
                                    style="height: 120px;width: 120px;"
                                    data-toggle="popover"
                                    data-trigger="hover"
                                    data-content="{{ $pro->description }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pro->name }}</h5>
                                    <p>Codigo:{{ $pro->code }}</p>

                                    <p class="card-text"><strong><b>Precio: </b> Bs {{ $pro->precio_venta}}</strong></p>

                                <div>
                                </div>
                                            <div  style="align-content: center">
                                                <p class="btn-holder">
                                                    <a href="{{ route('purchases.create') }}"
                                                        class="btn btn-primary text-center btn-block" type="submit"
                                                        name="codigo"
                                                        value="Agregar" role="button">
                                                        Agregar al carrito
                                                    </a>
                                                </p>
                                            </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

        </div>
        <div class="col-xl-7 col-md-8"><!--DESDE AQUI VISTA DE LA TABLA-->
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                <span class="mt-1 text-bg-black"><b>PRODUCTO</b></span></h2>
            <div class="d-sm flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center">
                    <div class="media-body pt-0">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $pro->id }}"  placeholder="Buscar producto" aria-label="Search">
                        <!--button-- type="button"  class="btn btn-primary"><i class="fas fa-times"></i></!--button-->
                        </div>

                        <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                            <span class="mt-1 text-bg-black"><b>Compras o Carrito</b></span></h2>
                            <div class="table-responsive">
                                <table class="table table-primary">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item</th>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Unidad</th>
                                            <th scope="col">Costo por unidad</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product )
                                        <tr class="">
                                            <td scope="row">{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->status }}</td>
                                            <th>{{ $product->price }}</th>
                                            <th>
                                                <div class="new-control-input">
                                                  <input class="form-check-input"
                                                  wire:change="addToCart($('#v'+{{ $product->id }}).is(':checked'),'{{ $product->id }}')"
                                                  type="checkbox" value="" id="v{{ $product->id }}"
                                                  {{ $product->checked==1? 'checked':'' }}>
                                                </div>
                                            </th>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Foto</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th style="width: 140px">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <!-- foreach( as )-->
                                    <tr >
                                        <td scope="row">
                                        <a href=""></a>
                                        </td>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td>
                                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left"
                                            style="max-width:10rem;">
                                            <div class="form-group mb-2">

                                                <input class="form-control form-control-sm" type="number" id="quantity1" value="1">
                                            </div>

                                                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width:10rem;">


                                                </div>
                                            </div>
                                        </td>
                                        <td scope="row"></td>
                                        <td class="text-right">Bs 500</td>


                                        <td style="width: 150px;">



                                       <button type="button"
                                       class="btn btn-danger"><i class="fa fa-trash-restore-alt"></i></button>

                                        </td>
                                    </tr>
                                    <!--endforeach-->


                                </tbody>

                            </table>
                            {{-- $purchases->render() --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-4 pt-3 pt-md-0">
                    <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                        <span><b>TOTAL</b></span></h2>
                    <div class="d-sm flex justify-content-between my-3 pb-3 border-bottom">
                        <div class="media d-block d-sm-flex text-center">
                            <div class="media-body pt-3">
                                <h6 class="product-card-title fonr-weight-semibold border-0 pb-0"><a href=""><b>CANTIDAD DE PRODUCTOS</b></a></h6>
                                <div class="font-size-sm"><span class="text-muted mr-2"></span></div>
                                <div class="font-size-sm"><span class="text-muted mr-2"></span></div>
                                <div class="font-size-lg text-black"><span><b>Total Bs:</b></span></div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7 col-md-4 pt-3 pt-md-0">
                                    <div class="form-group">
                                        <label for="">Proveedores</label>
                                        <select wire:model.lazy="provider" class="form-control" name="" id="">
                                            <option value="">Seleccionar</option>
                                            @foreach ($providers as $item )
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-4 pt-3 pt-md-0">
                                    <div class="form-group">
                                        <label for="" class="form-label">Codigo de factura</label>
                                        <input type="text"
                                          class="form-control"  name="" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="form-group">
                             <label for="" class="form-label">Observacion</label>
                             <textarea class="form-control"  name="" id="" rows="2"></textarea>
                        </div>


                        <button  class="btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i>Confirmar compra</button>

                        <button  class="btn btn-secondary btn-block"><i class="fa fa-bug"></i> Cancelar</button>


                       </div>
                </div>
            </div>
        </div><!--HASTA AQUI LA VISTA DE LA TABLA-->


    </div>
</div>

</div>
@section('scripts')
@stop
@endsection
