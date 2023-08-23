<form action="" method="post" enctype="multipart/form-data">
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true"
role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-primary text-center" id="modalTitleId"><i class=" fa fa-money-bill"></i>Forma de Pago</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class=" col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route'=>'categories.store', 'method'=>'post']) !!}
                            @csrf
                            <div class="mb-1">
                                <label for="" class="form-label text-danger">Monto Bs </label>
                              <label for="" class="form-label text-white badge-dark "><h3><b> {{number_format($total, 2)}}</b></h3></label>
                            </div>

                                <div class="mb-1">
                                    <label for="" class="form-label">Tasa de cambio</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>

                                <div class="mb-1">
                                    <label for="" class="form-label">Divisa en efectivo $</label>
                                    <input type="number" name="divisa" id="divisa" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                  <div class="mb-1">
                                    <label for="vuelto" class="form-label" ><small><b>Vuelto: $<label class="text-info">6,00</label></b></small></label>
                                    <label for="" class="form-label"><small><b>Resta: $<label class="text-danger">0,25</label></b></small></label>
                                </div>

                                  <div class="mb-1">
                                    <label for="" class="form-label">Abono $ Bshttps://www.bcv.org.ve/#:~:text=USD-,32%2C17850000,-Fecha%20Valor%3A</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                  <div class="mb-1">
                                    <label for="" class="form-label">Pago total $ Bs</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="" id="" value="{3:option1}">
                                        <label class="form-check-label" for="">Divisa</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="" id="" value="option2">
                                        <label class="form-check-label" for="">Bolivares Efectivo</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="" id="" value="option3" >
                                        <label class="form-check-label" for="">Bolivares debito</label>
                                      </div>

                                </div>
<br><br>

                                <button type="submit" class="btn btn-primary mr-2" style="font-size: 1rem;">Facturar</button>
                                <a href="{{ route('vender.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>

                        {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

</form>




