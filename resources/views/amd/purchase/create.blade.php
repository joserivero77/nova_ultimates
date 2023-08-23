@extends('layouts.amd')
@section('title'.'Gestion de compras')
@section('styles')
<link rel="stylesheet" href="/css/bootstrap.min.css">
<style type="text/css">
.divider {
        margin: 2 1.5rem 1.5rem;
    }
.unstyled-button
{
    border: none;
    padding: 0;
    background: none;
}
</style>
@endsection
<div class="container">
    @if (session('success'))
        <div class="alert alert-default-success">
            {{ session('success') }}
        </div>
    @endif

</div>
@section('content')

<div class="container mb-3">
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3 col-xl-3 col-xxl-3 col-3">
            <!-- Content Wrapper -->
            <div class="dropdown open">
                <a href="#" class=" btn btn-primary dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" type="button" id="triggerId" aria-expanded="false"><i class="fa fa-shopping-cart"></i>

                    Car<span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <div class="row total-header-section">
                        @php $total=0 @endphp
                        @foreach ((array) session('cart') as $id=>$details )
                            @php
                                $total+=$details['precio_venta']*$details['quantity']
                            @endphp
                         @endforeach
                         <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p><h4>Total:<span class="text-info">Bs {{ $total }}</h3></span></p>
                         </div>

                         @if (session('cart'))
                             @foreach (session('cart') as $id=>$details )
                             <div class="container">
                                <div class="row cart-detail">
                                    <div class="col-lg-5 col-sm-5 col-5 cart-detail-img p-md-2">
                                        <img style="max-width: 80px" src="{{ asset('/image') }}/{{ $details['image'] }}" alt="">
                                    </div>
                                    <div class="col-lg-7 col-sm-7 col-7 cart-detail-product">
                                        <p><h5>{{ $details['name'] }}</h5></p>
                                        <span class="price text-info"><b>Bs{{ $details['precio_venta'] }}</b></span>
                                        <div>
                                            <span class="count"><b>Cantidad:{{ $details['quantity'] }}</b></span>
                                        </div>

                                    </div>
                                 </div>
                             </div>


                             @endforeach

                         @endif

                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-center checkout">
                            <a href="" class="btn btn-primary btn-block">Ver todo</a>
                        </div>
                    </div>
                </div>
            </div><br>
        </div>
    </div>
</div>

<!--otro contenedor-->
    <div class="container pb-3 mt-n2 mt-md-n3">
    <div class="row">
        <div class="col-xl-5 col-md-4 pt-3 pt-md-0">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                <span><b>CATALOGO DE PRODUCTOS</b></span></h2>
                <div class="container">
                    <div class="row"><!--tarjetas del catalogo-->
                        @foreach ($products as $pro )
                        <div class="col-6">
                            <div class="card text-center justify-content-between align-content-lg-between" style="width: 200px">
                                <div class="container align-content-center">
                                    <img class="card-img-top img-fluid img_thumbnail"
                                    src="{{ asset('/image') }}/{{ $pro->image }}"
                                    alt="Title"
                                    title="Categoria"
                                    style="height: 100px;width: 100px;"
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
                                                    <a href="{{ route('add_to_cart',$pro->id) }}"
                                                        class="btn btn-primary text-center btn-block"
                                                        type="submit"
                                                        name="codigo"
                                                        value="Agregar" role="button">
                                                        Agregar al carrito
                                                    </a>
                                                </p>
                                            </div>
                                            <div  style="align-content: center">
                                                <form action="{{route("pasarId",$pro->code)}}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <button class="btn btn-primary text-center btn-block"
                                                        type="submit"
                                                        name="codigo"
                                                        value="Agregar"
                                                        role="button">Agregar al carrito2</button>

                                                    </div>
                                                </form>

                                                <p class="btn-holder">
                                                    <a href="{{ route('pasarId',$pro->code) }}"
                                                        class="btn btn-primary text-center btn-block"
                                                        type="submit"
                                                        name="codigo"
                                                        value="Agregar" role="button">
                                                        Agregar al carrito3
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
                            <input type="text" class="form-control" value=""
                            placeholder="Buscar producto" aria-label="Search">
                        <!--button-- type="button"  class="btn btn-primary"><i class="fas fa-times"></i></!--button-->
                        </div>


                        <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                            <span class="mt-1 text-bg-black"><b>Compras o Carrito</b></span></h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th scope="col">Producto</th>

                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total=0
                                    @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id=>$details )
                                            @php $total+=$details['precio_venta']*$details['quantity']
             @endphp
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Producto">
                                            <div class="row">
                                                <div class="col-sm-3 hidden-xs"><img src="{{ '/image' }}/{{ $details['image'] }}" alt=""
                                                    width="80" height="80" class="img-responsive"></div>
                                                <div class="col-sm-9">
                                                    <h5 class="nomargin">{{ $details['name'] }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Precio">{{ $details['precio_venta'] }}</td>
                                        <td data-th="Quantity">
                                            <input type="number" value="{{ $details['quantity'] }}" class=" form-control quantity cart_update" min="1">
                                        </td>
                                        <td data-th="Subtotal">{{ $details['precio_venta']*$details['quantity'] }}</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash"></i> Borrar</button>
                                        </td>
                                    </tr>
                                        @endforeach

                                    @endif
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
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right"><h3><strong>Total Bs{{ $total }}</strong></h3></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right">
                                                <a href="{{ '/' }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Continuar con la compra</a>
                                                <button class="btn btn-success"><i class="fa fa-money"></i>Checkout</button>
                                            </td>
                                        </tr>
                                    </tfoot>
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


@endsection
<!--div class="col-12">

        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/img/imagenes/OIP (1).jpg" class="d-block w-25 h-40" alt="...">
              </div>
              <div class="carousel-item">
                <img src="/img/imagenes/OIP (2).jpg" class="w-25 d-block h-40"  alt="...">
              </div>
              <div class="carousel-item">
                <img src="/img/imagenes/OIP (3).jpg" class="d-block w-25 h-40" alt="...">
              </div>
              <div>
                <img src="/img/imagenes/OIP (4).jpg" class="w-25 d-block h-40"  alt="">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </!--div>
</div-->
@section('scripts')
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
{!! Html::script('js/jquery-3.5.1.min.js') !!}
    {!! Html::script('sbadmin/vendor/jquery/jquery.min.js') !!}
        {!! Html::script('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
        {!! Html::script('js/bootstrap.bundle.min.js') !!}
        {!! Html::script('sbadmin/vendor/jquery-easing/jquery.easing.min.js') !!}
        {!! Html::script('sbadmin/js/sb-admin-2.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}


    <script type="text/javascript">
        $(document).ready(function(){

            $(".cart_update").change(function(e){
            e.preventDefault();
            var ele=$(this);

                $(.ajax{
                    url:'{{ route('update_cart') }}',
                    method:"patch",
                    data:{
                        _token:'{{ csrf_token() }}',
                        id:ele.parents("tr").attr("data-id"),
                        quantity:ele.parents("tr").find(".quantity").val(),
                    },
                    success:function(response){
                        window.location.reload();
                    },
                });

            });



        $(".cart_remove").click(function (e){
            e.preventDefault();
            var ele=$(this);
            if(confirm("Realmente desea eliminar este producto del carrito?")){
                $(.ajax{
                    url:'{{ route('remove_from_cart') }}',
                    method:'DELETE',
                    data:{
                        _token:'{{ csrf_token() }}',
                        id:ele.parents("tr").attr("data-id"),
                    },
                    success:function(response){
                        window.location.reload();
                    },
                });
            };
        });
        });
    </script>


    <!-- Jquery Min Js -->

<!-- Bootstrap core JavaScript->

<script-- src="vendor/jquery/jquery.min.js"></script-->

<!--script src="/js/bootstrap.min.js"></!--script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


<script src="js/sb-admin-2.min.js"></script>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script-- src="js/demo/datatables-demo.js"></script-->


@endsection
