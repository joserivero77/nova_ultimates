<form action="" method="post" enctype="multipart/form-data">
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true"
role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-bg-primary" id="modalTitleId"><i class="fa fa-user-alt"></i>Registrar Proveedor</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class=" col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            {!! Form::open(['route'=>'providers.store', 'method'=>'post']) !!}
                <div class="form-group">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" id="name"  aria-describedby="helpId"
                  class="form-control @error('name') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId">

                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email"  aria-describedby="helpId"
                  class="form-control @error('email') is-invalid
                  @enderror" placeholder="example@gmail.com" aria-describedby="helpId">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                  <label for="rif" class="form-label">Rif</label>
                  <input type="number" name="rif" id="rif"  aria-describedby="helpId"
                  class="form-control @error('rif') is-invalid
                  @enderror" placeholder=" ingrese hasta 11 digitos" aria-describedby="helpId">
                  @error('rif')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-label">Direccion</label>
                    <input type="text" name="address"  id="address" aria-describedby="helpId"
                    class="form-control @error('address') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror

                  </div>
                  <div class="form-group">
                    <label for="phone" class="form-label">Telefono/Celular</label>
                    <input type="number" name="phone"  id="phone" aria-describedby="helpId"
                    class="form-control @error('phone') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                  </div>


                <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                <a href="{{ route('providers.index') }}" class="btn btn-danger">Cancelar</a>
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




