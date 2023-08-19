<form action="" method="post" enctype="multipart/form-data">
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true"
role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-bg-primary" id="modalTitleId"><i class="fa fa-address-book"></i>Registrar Cliente</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class=" col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route'=>'visitas.store', 'method'=>'post']) !!}
                @csrf
                <div class="form-group">
                    <label for="client_id" class="form-label">Cliente</label>
                    <select class="form-control" name="client_id" id="client_id">
                        <option value="">Seleccionar</option>
                        @foreach ($clientes as $client )
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <label for="motivo" class="form-label">Motivo</label>
                  <input type="text" name="motivo" id="motivo"  aria-describedby="helpId" class="form-control" placeholder="" aria-describedby="helpId">
                </div>


                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('visitas.index') }}" class="btn btn-danger">Cancelar</a>
            {!! Form::close() !!}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </!--div-->
        </div>
    </div>
</div>

</form>




