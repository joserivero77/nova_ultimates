@extends('layouts.amd')
@section('stylescss')

@stop
<div>
@section('content')
<div class="container pb-5 mt-n2 mt-md-n3">
    <div class="row">
        <div class="col-xl-9 col-md-8"><!--DESDE AQUI VISTA DE LA TABLA-->
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                <span class="mt-1 text-bg-black"><b>PRODUCTO</b></span></h2>
            <div class="d-sm flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center">
                    <div class="media-body pt-3">
                        <div class="form-group">
                            <input type="text" class="form-control" wire:model="search" placeholder="Buscar producto" aria-label="Search">
                        <button type="button" wire:click="resetSearch()" class="btn btn-primary"><i class="fas fa-times"></i></button>
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
                                    @foreach($cart_content as $content)
                                    <tr >
                                        <td scope="row">
                                        <a href="{{ route('purchases.show', $content)  }}">{{$content->id}}</a>
                                        </td>
                                        <th scope="row">{{$content->picture}}</th>
                                        <td>{{ $content->name}}</td>
                                        <td>
                                            <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left"
                                            style="max-width:10rem;">
                                                <div class="form-group mb-2">
                                                    <input class="form-control form-control-sm"
                                                    id="v{{ $content->id }}"
                                                    wire:change="updateQuantity({{ $content->id }},$('#v'+{{$content->id  }}).val())"
                                                    type="number"  value="{{ $content->quantity }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td scope="row">{{$content->price}}</td>
                                        <td class="text-right">Bs 500</td>


                                        <td style="width: 150px;">

                                        <!--a class="jsgrig-button jsgrid-edit-button" href="{{ route('purchases.edit',$content) }}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </!--a-->
                                        <!--button class="jsgrig-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar" href="">
                                            <i class="far fa-trash-alt"></i></!--button-->


                                       <!--a href="{{ route('purchases.show', $content)  }}" class="jsgrid-button jsgrid-edit-button btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                       </a-->



                                       <button type="button" wire:click="removeItem({{ $content->id }})"
                                       class="btn btn-danger"><i class="fa fa-trash-restore-alt"></i></button>

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
        </div><!--HASTA AQUI LA VISTA DE LA TABLA-->
        <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                <span><b>TOTAL</b></span></h2>
            <div class="d-sm flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center">
                    <div class="media-body pt-3">
                        <h6 class="product-card-title fonr-weight-semibold border-0 pb-0"><a href=""><b>CANTIDAD DE PRODUCTOS</b></a></h6>
                        <div class="font-size-sm"><span class="text-muted mr-2"></span>{{ $items_count }}</div>
                        <div class="font-size-sm"><span class="text-muted mr-2"></span></div>
                        <div class="font-size-lg text-black"><span><b>Total Bs:{{ $total }}</b></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Proveedores</label>
                    <select wire:model="provider" class="form-control" name="" id="">
                        <option value="">Seleccionar</option>
                        @foreach ($providers as $item )
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Codigo de factura</label>
                    <input type="text"
                      class="form-control" wire:model.lazy="invoice_code" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                     <label for="" class="form-label">Observacion</label>
                     <textarea class="form-control" wire:model.lazy="observation" name="" id="" rows="2"></textarea>
                </div>

                <a href="" class="btn btn-primary btn-block"><i class="fas fa-shopping-cart"></i>  Confirmar compra</a>
                <a href="" class="btn btn-secondary btn-block"><i class="fa fa-bug"></i>  Cancelar</a>

                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width:10rem;">

                    <div class="form-group mb-2">
                        <label for="quantity1">Cantidad</label>
                        <input class="form-control form-control-sm" type="number" id="quantity1" value="1">
                    </div>
                    <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2">
                        <polyline points="23 4 23 10 17 10 "></polyline>
                        <polyline poinst="1 20 1 14 7 14"></polyline>
                        </svg>
                    </button>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width:10rem;">
                    <div class="form-group mb-2">
                        <label for="quantity1">Quantity</label>
                        <input class="form-control form-control-sm" type="number" id="quantity1" value="1">
                    </div>
                    <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentcolor" stroke-width="2">
                        <polyline points="23 4 23 10 17 10 "></polyline>
                        <polyline poinst="1 20 1 14 7 14"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
@section('scripts')
@stop
@endsection
