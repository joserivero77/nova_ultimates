<form action="{{ route('impuestos.update', $impuesto) }}" method="put" enctype="multipart/form-data" id="formulario">
    @csrf
    @method('PUT')
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade text-left" id="editmodalImpuesto" tabindex="-1" data-bs-keyboard="true" data-backdrop="static"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-primary text-center" id="modalTitleId"><i
                            class=" fa fa-money-bill"></i>Editar Impuesto</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i
                            class="far fa-times-circle"></i></button>
                </div>
                <div class="modal-body">

                    <label for="validation">Nombre</label>
        <div class="input-group mb-3">

            <span class="input-group-text badge-success" id="addon-wrapping"><i class="fa fa-address-card" aria-hidden="true"></I></span>
            <input type="text" name="nombre" id="validation" class="form-control" value="{{ $impuesto->nombre }}">
        </div>
        <label for="valor">Valor</label>
        <div class="input-group mb-3">

            <span class="input-group-text badge-success" id="inputGroup-sizing-default"><i class="fa fa-archive"></i></span>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ $impuesto->valor }}">
        </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('impuestos.index') }}" class="btn btn-danger">Cancelar</a>

                </div>


            </div>
        </div>
    </div>

</form>
