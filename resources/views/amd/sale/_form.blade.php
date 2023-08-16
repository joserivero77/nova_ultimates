<div class="form-group">
    <label for="client_id" class="form-label">Cliente</label>
    <select class="form-control" name="client_id" id="client_id">
        <option value="">Seleccionar</option>
        @foreach ($clients as $client )
        <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
  <label for="tax" class="form-label">Impuesto</label>
  <input type="number" name="tax" id="tax" class="form-control @error('tax') is-invalid
  @enderror"
  placeholder="%"  aria-describedby="helpId">
  @error('tax')
                  <span class="invalid-feedback" role="alert">
                      <strong>
                          {{ $message }}
                      </strong>
                  </span>
                @enderror
</div>
<div class="form-group">
    <label for="product_id" class="form-label">Producto</label>
    <select class="form-control" name="product_id" id="product_id">
        <option value="">Seleccionar</option>
        @foreach ($products as $product )
        <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->price }}">{{ $product->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="" class="form-label">Stock</label>
    <input type="number" name="" id="stock" class="form-control" value="" disabled>
  </div>
<div class="form-group">
    <label for="price" class="form-label">Precio de venta</label>
    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid
    @enderror" disabled placeholder="Bs"
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
    <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid
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
    <label for="discount" class="form-label">Porcentaje de Descuento</label>
    <input type="number" name="discount" id="discount" value="0" class="form-control @error('discount') is-invalid
    @enderror" >
    @error('discount')
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
    <h4>Detalles de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de venta(Bs)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal(Bs)</th>
                </tr>
            </thead>
            <tfoot>

                <tr id="">
                    <th  colspan="5">

                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p id="total"><span > 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th  colspan="5">
                        <p align="right">TOTAL IMPUESTO</p>
                    </th>
                    <th>
                        <p id="total_impuesto"><span > 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th  colspan="5">
                        <p align="right">EXCENTO</p>
                    </th>
                    <th>
                        <p id="total_impuesto"><span > 0.00</span></p>
                    </th>
                </tr>
                <tr id="">
                    <th   colspan="5">
                        <p align="right">TOTAL A PAGAR</p>
                    </th>
                    <th>
                        <p ><span id="total_pagar_html">(Bs) 0.00</span>
                        <input type="hidden" id="total_pagar" name="total"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>

            </tbody>
        </table>
</div>








           <!--
            swal ( "Oops" ,  "Something went wrong!" ,  "error" )
NORMAL ALERT
alert ( "Oops, something went wrong!" )
swal({
  icon: "success",
});



        -->
