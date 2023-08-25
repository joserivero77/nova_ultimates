<form action="" method="" enctype="multipart/form-data">
    @csrf
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade text-left" id="catalogomodal" tabindex="-1" data-bs-keyboard="true" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-bg-primary" id="modalTitleId"><i class="fa fa-address-book"></i>CATALOGO DE PRODUCTOS
                    </h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i
                            class="far fa-times-circle"></i></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <!--<div class="row">
                            <div class="col-12 align-content-sm-center align-content-md-center">
                                <div class="row">
                                    <div class=" card col-lg-12 col-md-3 col-sm-4 col-xl-3 col-xxl-3">
                                        @foreach ($prod as $pro)
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

                                                        <form action="{{ route('pasarIdc', $pro->code) }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <button class="btn btn-primary text-center btn-block" type="submit"
                                                                    name="" value="Agregar" role="button">Agregar al
                                                                    carrito</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>-->

                    </div>
                    <div class="row">
                        <strong>

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

</form>
