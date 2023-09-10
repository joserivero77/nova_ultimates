<form action="" method="post" enctype="multipart/form-data">
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true"
role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-bg-primary" id="modalTitleId"><i class="fa fa-address-book"></i>Registro de Categorias</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class=" col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route'=>'categories.store', 'method'=>'post']) !!}
                            @csrf
                            @include('amd.category._form')
                            <div>
                                <button type="submit" class="btn btn-primary mr-2" style="font-size: 1rem;">Registrar</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
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




