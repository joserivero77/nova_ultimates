<div>
    @extends('layouts.amd')

@section('content')
<div class="container pb-5 mt-n2 mt-md-n3">
    <div class="row">
        <div class="col-xl-9 col-md-8"><!--DESDE AQUI VISTA DE LA TABLA-->
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                <span class="mt-1 text-bg-black"><b>PRODUCTO</b></span></h2>
            <div class="d-sm flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center">
                    <div class="media-body pt-3">
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
        </div><!--HASTA AQUI LA VISTA DE LA TABLA-->
        <div class="col-xl-3 col-md-3">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-warning">
                <span><b>TOTAL</b></span></h2>
            <div class="d-sm flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center">
                    <div class="media-body pt-3">
                        <h6 class="product-card-title fonr-weight-semibold border-0 pb-0"><a href=""><b>CANTIDAD DE PRODUCTOS</b></a></h6>
                        <div class="font-size-sm"><span class="text-muted mr-2"></span>45</div>
                        <div class="font-size-sm"><span class="text-muted mr-2"></span></div>
                        <div class="font-size-lg text-black"><span><b>$125.00</b></span></div>
                    </div>
                </div>
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
@endsection
