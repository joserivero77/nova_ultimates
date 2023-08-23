<form action="" method="post" enctype="multipart/form-data">
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-bg-primary" id="modalTitleId"><i class="fa fa-address-book"></i>Registrar Producto</h2>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class=" col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    {!! Form::open(['route'=>'products.store', 'method'=>'post', 'files'=>'true']) !!}

                <div class="form-group">
                    <label for="name" class="form-label">Nombre</label>
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
                    <label for="description" class="form-label">Descripcion</label>
                    <input type="text" name="description" id="description"  aria-describedby="helpId"
                    class="form-control @error('description') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                  </div>
                  <div class="form-group">
                    <label for="precio_compra" class="form-label">Precio de compra</label>
                    <input type="number" name="precio_compra" id="precio_compra"  aria-describedby="helpId"
                    class="form-control @error('precio_compra') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('precio_compra')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                  </div>
                  <div class="form-group">
                  <label for="precio_venta" class="form-label">Precio de venta</label>
                  <input type="number" name="precio_venta" id="precio_venta"  aria-describedby="helpId"
                  class="form-control @error('precio_venta') is-invalid
                  @enderror" placeholder="" aria-describedby="helpId">
                  @error('precio_venta')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="unit" class="form-label">Unidad de medida</label>
                    <input type="text" name="unit" id="unit"  aria-describedby="helpId"
                    class="form-control @error('unit') is-invalid
                    @enderror" placeholder="" aria-describedby="helpId">
                    @error('unit')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                  @enderror
                  </div>
                <div class="form-group">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Seleccionar</option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="custom-file mb-4">
                    <input type="file" class="custom-file-input" id="picture" name="picture" lang="es">
                    <label for="picture" class="custom-file-label">Seleccionar Archivo</label>
                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary mr-2" style="font-size: 1rem;">Registrar</button>
                                    <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>

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
