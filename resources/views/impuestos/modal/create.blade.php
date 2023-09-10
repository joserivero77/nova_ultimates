<form action="" method="post" enctype="multipart/form-data" id="formulario">
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade text-left" id="createmodalImpuesto" tabindex="-1" data-bs-keyboard="true" data-backdrop="static"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-primary text-center" id="modalTitleId"><i
                            class=" fa fa-money-bill"></i>Crear Impuesto</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i
                            class="far fa-times-circle"></i></button>
                </div>
                <div class="modal-body">

                    <label for="">Nombre</label>
                    <div class="input-group mb-3">

                        <span class="input-group-text badge-success" id="addon-wrapping"><i class="fa fa-address-card"
                                aria-hidden="true"></I></span>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <label for="">Impuesto</label>
                    <div class="input-group mb-3">

                        <span class="input-group-text badge-success" id="inputGroup-sizing-default"><i
                                class="fa fa-archive"></i></span><input type="text" name="valor" id="valor"
                            class="form-control">
                    </div>
                    {!! Form::open(['route'=>'impuestos.store', 'method'=>'post']) !!}
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    <a href="{{ route('impuestos.index') }}" class="btn btn-danger btn-sm">Cancelar</a>

                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

</form>
