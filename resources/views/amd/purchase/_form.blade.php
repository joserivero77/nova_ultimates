<div>
    <div class="form-group">
        <label for="provider_id" class="form-label">Proveedor</label>
        <select class="form-control" name="provider_id" id="provider_id">
            <option value="">Seleccionar</option>
            @foreach ($providers as $provider )
            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
      <label for="tax" class="form-label">Impuesto</label>
      <input type="number" name="tax" id="tax" class="form-control" placeholder="%"  aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="product_id" class="form-label">Producto</label>
        <select class="form-control" name="product_id" id="product_id">
            <option value="">Seleccionar</option>
            @foreach ($products as $product )
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price" class="form-label">Precio de compra</label>
        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid
        @enderror" placeholder="Bs"
        aria-describedby="helpId">
        @error('price')
                      <span class="invalid-feedback" role="alert">
                          <strong>
                              {{ $message }}
                          </strong>
                      </span>
                    @enderror
    </div>
    <div class="form-group">
        <label for="quantity" class="form-label">Cantidad</label>
        <input type="number" name="quantity" id="quantity"
        class="form-control @error('quantity') is-invalid
        @enderror" placeholder=""  aria-describedby="helpId">
        @error('quantity')
                      <span class="invalid-feedback" role="alert">
                          <strong>
                              {{ $message }}
                          </strong>
                      </span>
                    @enderror
    </div>

    <div class="form-group">
        <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Producto</button>
    </div>

    <div class="form-group">
        <h4 class="card-title">Detalles de Compra</h4>
        <div class="table-responsive col-md-12">
            <table id="detalles" class="table table-striped">
                <thead>
                    <tr>
                        <th>Eliminar</th>
                        <th>Producto</th>
                        <th>Precio(Bs)</th>
                        <th>Cantidad</th>
                        <th>SubTotal(Bs)</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr id="">
                        <th colspan="4">
                            <p align="right">Total:</p>
                        </th>
                        <th >
                            <p align="right" id="total"><span > 0.00</span></p>
                        </th>
                    </tr>
                    <tr id="dvocultar">
                        <th colspan="4">
                            <p align="right">TOTAL IMPUESTO</p>
                        </th>
                        <th>
                            <p align="right" id="total_impuesto"><span > 0.00</span></p>
                        </th>
                    </tr>
                    <tr id="">
                        <th colspan="4">
                            <p align="right">TOTAL A PAGAR</p>
                        </th>
                        <th>
                            <p align="right" ><span id="total_pagar_html" >(Bs) 0.00</span><input type="hidden"  name="total" id="total_pagar"></p>
                        </th>
                    </tr>
                </tfoot>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>






               <!--
                swal ( "Oops" ,  "Something went wrong!" ,  "error" )
    NORMAL ALERT
    alert ( "Oops, something went wrong!" )
    swal({
      icon: "success",
    });



            -->
