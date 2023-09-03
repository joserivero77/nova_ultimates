<form action="{{ route('pagos.store') }}" method="post" enctype="multipart/form-data" id="formulario">
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true" data-backdrop="static"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-primary text-center" id="modalTitleId"><i
                            class=" fa fa-money-bill"></i>Forma de Pago</h2><label for="" id="dolar"></label>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i
                            class="far fa-times-circle"></i></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class=" col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <form action="" method="post">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="id_venta" class="text-info">Cliente/Factura</label>
                                                        <select class="form-control" name="id_venta" id="id_venta"
                                                            required placeholder="Seleccione un Cliente">
                                                            <option></option>
                                                            @foreach ($ventas as $venta)
                                                                <option value="{{ $venta->id }}">
                                                                    {{ $venta->cliente->name }}->Fact#{{ $venta->id }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">Debe seleccionar un cliente</div>
                                                    </div>
                                                </div>


                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="monto" class="form-label text-info">Factura a
                                                            pagar</label>
                                                        <select class="form-control" id="monto" name="monto1"
                                                            required>
                                                            <option value="0">Seleccione una factura</option>
                                                            @foreach ($totales as $total)
                                                                <option value="{{ $total->total }}">
                                                                <label>Fact #{{ str_pad($total->id, 7, '0', STR_PAD_LEFT) }}</label></option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>


                                        <div class="container">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <h5><label for="" class="form-label text-danger">Monto
                                                                Bs
                                                            </label><label for="" name="totalLabel"
                                                                id="totalLabel"class="form-label text-white badge-dark ">/Ref_
                                                                <p id=""></p>
                                                            </label><label for="" id="ref">/Ref_<p
                                                                    id="total$"></p>
                                                            </label></h5>
                                                    </div>
                                                </div>
                                                <div class=" col-4 mb-1">
                                                    <label for="" class="form-label text-bg-info" id="tasa1">Tasa de
                                                        cambio</label>
                                                    <input type="text" name="tasa" id="tasa"
                                                        class="form-control" placeholder="" aria-describedby="helpId"
                                                        required>

                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label text-primary"
                                                        for="inlineRadio1">Referencia $</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label text-primary" for="inlineRadio2">Pago
                                                        Bs</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="checkbox1"
                                                        name="checkbox1" value="option1">
                                                    <label class="form-check-label text-primary" for=""
                                                        id="checkboxLabel">Debito
                                                        Bs</label>
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="" class="form-label" id="divis1">Divisa
                                                    $</label>
                                                <input type="number" name="divisa" id="diviza"
                                                    class="form-control" disabled
                                                    placeholder="Ingrese solo numeros enteros 1,2,3..."
                                                    aria-describedby="helpId">
                                                <label for="" class="form-label" id="debito1">Monto Debito
                                                    Bs</label>
                                                <input type="text" name="debito2" id="debito3"
                                                    class="form-control" placeholder="" aria-describedby="helpId"
                                                    autocomplete="false">

                                            </div>
                                            <div class="mb-1">
                                                <label for="vuelto" class="form-label"
                                                    id="vuelto2"><small><b>Vuelto:
                                                            $<label class="text-info"
                                                                id="vuelto"></label></b></small></label>
                                                <label for="" class="form-label"
                                                    id="resta2"><small><b>Resta:
                                                            $<label class="text-danger" id="resta"
                                                                name="resta"></label></b></small></label>

                                                <label for="" class="form-label"
                                                    id="eq1"><small><b>Equivalente
                                                            a Bs
                                                            <label class="text-info" name="eqBs"
                                                                id="eqBs"></label></b></small></label>
                                            </div>

                                            <div class="mb-1">
                                                <label for="" class="form-label" id="parcialLabel">Pago
                                                    Realizado
                                                    Bs</label>
                                                <input type="text" name="parcialBs" id="parcialBs"
                                                    class="form-control" placeholder="" aria-describedby="helpId"
                                                    autocomplete="false">
                                            </div>
                                            <div class="mb-1">
                                                <input type="text" name="deuda" id="deud" hidden
                                                    class="form-control" placeholder="" aria-describedby="helpId"
                                                    autocomplete="false">
                                            </div>
                                            <div class="mb-1">
                                                <input type="text" name="diferen" id="diferen" hidden
                                                    class="form-control" placeholder="" aria-describedby="helpId"
                                                    autocomplete="false">
                                            </div>
                                            <label for="" class="form-label"
                                                id="diferenciaLabel"><small><b>Resta: Bs<label class="text-danger"
                                                            id="diferencia"
                                                            name="diferencia"></label></b></small></label>

                                            <div class="mb-3">
                                                <label for="" class="form-label"
                                                    id="descripcionLabel">Detalle
                                                    del pago</label>
                                                <textarea class="form-control" name="description" id="descripcion" rows="3"
                                                    placeholder="Ejemplo: Pago movil Banco por Bs: X.XXX.XXX,XX tlf: 041X-XXXXXXX Ref: 0001452321522 en fecha:12-08-18"
                                                    aria-describedby="helpId" autocomplete="false"></textarea>
                                            </div>

                                            <div class="mb-1">
                                                <label for="" class="form-label text-bg-primary"
                                                    id="pagoLabel">Pago total Bs</label>
                                                <input type="text" name="pago_parcial" id="pago"
                                                    class="form-control" placeholder="" aria-describedby="helpId"
                                                    autocomplete="false">
                                            </div>

                                            <br>





                                            <div class="form-group">
                                                <label for="id_cliente" hidden>ID Cliente:</label>
                                                <select name="id_cliente" id="id_cliente" class="form-control"
                                                    hidden>
                                                    <option value="">Seleccione un cliente</option>
                                                </select><!--este campo se selecciona automaticamente con js-->
                                            </div>

                                            <button type="submit" class="btn btn-primary mr-2 btn-sm"
                                                style="font-size: 1rem;">Facturar</button>
                                            <a href="" class="btn btn-danger btn-sm">Cancelar</a>

                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</form>
<script>
consultaDolar.getMonitor("BCV", "lastUpdate").then($ =>{console.log('BCV: '+$)}); /*Obtener la ultima actualizacion del dólar en BCV*/
document.getElementById('dolar').innerText=$;
</script>
<script>//Script para cargar los datos del id_cliente al seleccionar la compra pero del id_venta que ha realiado ese cliente
    document.getElementById('id_venta').addEventListener('change', function() {
        var selectedVenta = this.value;
        var idClienteSelect = document.getElementById('id_cliente');

        // Limpiar opciones anteriores
        idClienteSelect.innerHTML = '';

        // Obtener clientes relacionados con la venta seleccionada
        var clientes = @json($clientes);
        var filteredClientes = Object.keys(clientes).reduce(function(filtered, id_venta) {
            if (selectedVenta == id_venta) {
                filtered[id_venta] = clientes[id_venta];
            }
            return filtered;
        }, {});

        // Agregar opciones al select de clientes
        Object.entries(filteredClientes).forEach(function([id_venta, id_cliente]) {
            var option = document.createElement('option');
            option.value = id_cliente;
            option.text = id_cliente;
            idClienteSelect.appendChild(option);
        });
    });
</script>
<!--PAGO EN DIVISA-->
<script type="text/javascript">
    const divis1 = document.getElementById('divis1');
    const divis2 = document.getElementById('diviza');
    const deud = document.getElementById('deud');
    const inlineRadio1 = document.getElementById('inlineRadio1');
    const eq1 = document.getElementById('eq1');
    document.getElementById('diferen');
    document.getElementById('tasa1').style.display = 'none';
    document.getElementById('tasa').style.display = 'none';
    document.getElementById('descripcion');
    document.getElementById('descripcionLabel').style.display = 'none';
    document.getElementById('descripcion').style.display = 'none';
    document.getElementById('ref').style.display = 'none';
    var tot = document.getElementById('monto');
    document.getElementById('monto').addEventListener('click', captamonto);

    function captamonto() {
        let timp = document.getElementById("monto").value;
        tot = parseFloat(timp);
        if(tot=="Seleccione una factura"){
            totalLabel.innerText = 'No hay factura seleccionada';
        }else{
            totalLabel.innerText = tot;
        }

        document.getElementById('totalLabel').style.display = 'inline-Block';
        console.log('monto: ' + tot);
    }


    divis1.style.display = 'none';
    divis2.style.display = 'none';
    vuelto.style.display = 'none';
    vuelto2.style.display = 'none';
    resta2.style.display = 'none';
    eq1.style.display = 'none';
    eqBs.style.display = 'none';
    parcialLabel.style.display = 'none';
    parcialBs.style.display = 'none';
    inlineRadio1.addEventListener('click', divisa);
    inlineRadio2.addEventListener('click', Bs);
    document.getElementById('tasa').addEventListener('keyup',habilitadivisa);

    function habilitadivisa(){

                document.getElementById('diviza').disabled = false;

    }
    function divisa() {
        if (inlineRadio1.checked = true) {
            console.log('divisa');
            divis1.style.display = 'block';
            divis2.style.display = 'block';
            vuelto.style.display = 'inline-block';
            vuelto2.style.display = 'inline-block';
            resta2.style.display = 'inline-block';
            document.getElementById('tasa').focus=true;
            document.getElementById('checkbox1').style.display = 'block';
            document.getElementById('checkboxLabel').style.display = 'block';
            document.getElementById('parcialLabel').style.display = 'none';
            document.getElementById('parcialBs').style.display = 'none';
            document.getElementById('diferenciaLabel').style.display = 'none';
            document.getElementById('diferencia').style.display = 'none';
            document.getElementById('eq1').style.display = 'inline-block';
            document.getElementById('eqBs').style.display = 'inline-block';
            document.getElementById('ref').style.display = 'inline-block';
            document.getElementById('parcialLabel').value = '';
            document.getElementById('parcialBs').value = '';
            document.getElementById('diferenciaLabel').value = '';
            document.getElementById('diferencia').value = '';
            document.getElementById('pago').value = '';
            document.getElementById('tasa1').style.display = 'block';
            document.getElementById('tasa').style.display = 'block';
            document.getElementById('descripcion').value = "";
        }
        if (inlineRadio1.checked == true && checkbox1.checked) {
            document.getElementById('descripcionLabel').style.display = 'block';
            document.getElementById('descripcion').style.display = 'block';
        } else {
            document.getElementById('descripcionLabel').style.display = 'none';
            document.getElementById('descripcion').style.display = 'none';
        }
    }

    function Bs() {
        if (inlineRadio2.checked = true) {

            console.log('bs');
            divis1.style.display = 'none';
            divis2.style.display = 'none';
            vuelto.style.display = 'none';
            vuelto2.style.display = 'none';
            resta2.style.display = 'none';
            document.getElementById('descripcionLabel').style.display = 'block';
            document.getElementById('ref').style.display = 'none';
            document.getElementById('descripcion').style.display = 'block';
            document.getElementById('descripcion').value = "";
            document.getElementById('diviza').checked = true;
            document.getElementById('tasa1').style.display = 'none';
            document.getElementById('tasa').style.display = 'none';
        }
    }
</script>
<script type="text/javascript">
    var n1 = document.getElementById('monto');
    var n2 = document.getElementById('diviza');
    const btn = document.getElementById('boton');
    const vuelto = document.getElementById('vuelto');
    const vuelto2 = document.getElementById('vuelto2');
    const resta = document.getElementById('resta');
    const checkbox1 = document.getElementById('checkbox1');
    var debito = document.getElementById('debito3');
    const debito1 = document.getElementById('debito1');
    const debito3 = document.getElementById('debito3');
    var tasa = document.getElementById('tasa');
    const totalLabel = document.getElementById('totalLabel');
    const total$ = document.getElementById('total$');
    const pay = document.getElementById('pago');
    const eqBs = document.getElementById('eqBs');
    //eqBs.style.display='none';
    debito1.style.display = 'none';
    debito3.style.display = 'none';
    total$.style.display = 'none';
    totalLabel.style.display = 'none';
    n2.addEventListener('keyup', restar);
    debito.addEventListener('keyup', restar);
    checkbox1.addEventListener('change', mostrarDebito);
    checkbox1.addEventListener('change', debitarSi);
    checkbox1.addEventListener('change', restar);

    let tasa1;

    tasa.addEventListener('keyup', function() {
        total$.style.display = 'inline-block';
        //totalLabel.style.display = 'inline-block';
        restar();
    });


    let debito2;


    function mostrarDebito() {
        let nn2 = n2.value;
        console.log('chequed'); //
        if (checkbox1.checked) {
            debito1.style.display = 'block';
            debito3.style.display = 'block';
            eq1.style.display = 'inline-block';
            eqBs.style.display = 'inline-block';
            document.getElementById('descripcionLabel').style.display = 'block';
            document.getElementById('descripcion').style.display = 'block';
            let cambia
            let tot = document.getElementById("monto").value;
            total = parseFloat(tot);
            cambia = (total / tasa1).toFixed(2);
            if (nn2 < parseInt(cambia)) {

            } else {
                debito3.style.display = 'none';
            }

        } else {
            debito1.style.display = 'none';
            debito3.style.display = 'none';
            document.getElementById('debito3').value = "";
            let cambia
            cambia = (total / tasa1).toFixed(2); //console.log('cambia '+cambia+' divisa '+nn2+' (=)');
            if (nn2 = parseInt(cambia)) {
                //resta.innerText = deuda;
            }
        }
    }

    function debitarSi() {
        let cambio;
        let eqBs;
        const tas = tasa.value;
        const nn2 = n2.value;
        tasa1 = parseFloat(tas);
        cambio = (total / tasa1).toFixed(2);
        //let tot=document.getElementById("monto").value;
        total = parseFloat(tot);
        if (!checkbox1.checked) {
            deuda = (deuda - debito2).toFixed(2);
            //document.getElementById('deud').value=deuda;
            eqBs = (deuda * tasa1).toFixed(2);
            document.getElementById('deud').value = eqBs;
            //console.log('deuda debitarSi = (deuda - debito2)');
        } else {
            deuda = cambio - parseFloat(nn2).toFixed(2);
            resta.value = deuda;
            resta.innerText = deuda;
            eqBs = (deuda * tasa1).toFixed(2);
            document.getElementById('deud').value = eqBs;
            //console.log('deuda debitarSi ' + deuda);
        }
    }

    function restar() {

        const tas = tasa.value;
        let cambio;
        tasa1 = parseFloat(tas);
        let tot = document.getElementById("monto").value;
        total = parseFloat(tot);
        cambio = (total / tasa1).toFixed(2);
        //totalLabel.innerText=total;
        total$.innerText = cambio;
        //console.log('cambio$' + cambio);

        const deb = debito.value;
        if (deb != "") {
            debito2 = parseFloat(deb);
            console.log('HAY DEBIO ' + debito2);
        } else {
            debito2 = 0;
        }

        /*if(nn2==""){
            resta.innerText="";
            eqBs.innerText="";
            document.getElementById('pago').value="";
            document.getElementById('debito3').value="";
        }*/

        const nn1 = n1.value; //monto bs
        const nn2 = n2.value; //divisa
        const pago1 = pay.value;
        let pago;

        pago = parseFloat(pago1);

        let n3;
        let n4;
        let rest;
        let eqBs;
        n3 = parseFloat(nn1) - parseFloat(nn2);
        n4 = parseInt(cambio) - parseInt(nn2); //resta de parte entera de monto$ y divisa para obtener vuelto
        deuda = (cambio - parseInt(nn2)).toFixed(2); //resta para obtener deuda
        let decimal;
        //let tot=document.getElementById("monto").value;
        total = parseFloat(tot);
        decimal = parseFloat(total) - parseInt(total);

        //console.log('debito:' + debito2 + ' deuda_decimal: ' + deuda + ' deuda_entera ' + n4+' nn2: '+nn2+' cambio '+cambio);

        if (n4 < 0) { //divisa supera monto
            vuelto.style.display = 'inline-block';
            vuelto2.style.display = 'inline-block';
            eq1.style.display = 'inline-block';
            document.getElementById('eqBs').style.display = 'inline-block';
            //console.log('n4<0 esta pagando de mas->'+n4);
            resta2.style.display = 'inline-block';
            debito1.style.display = 'none'; //oculto etiqueta debito
            debito3.style.display = 'none'; //oculto input debito

            debito.min = 0; //console.log('deuda-'+deuda);
            deuda = deuda - debito2;
            //console.log('deuda ' + deuda + ' debito2 ' + debito2);

            rest = (cambio - parseInt(cambio)).toFixed(2);

            // requiere dar vuelto
            n4 = n4 * (-1);

            //console.log('rest>0.5 ' + rest + ' n4<0 ' + n4 + ' cambio: ' + cambio);
            debito.max = rest;
            debito.innerText = rest;
            //debito.disabled = true;
            if (checkbox1.checked == true) {
                resta.innerText = 0;
                eqBs = 0;
                let aux;
                aux = (rest * 1);
                document.getElementById('eqBs').innerText = eqBs;
                document.getElementById('eqBs').value = eqBs;
                document.getElementById('deud').value = eqBs;
                console.log('aux ' + aux);
                pago = (cambio - rest + aux).toFixed(2);

                if (decimal != 0) {
                    document.getElementById('pago').value = pago * tasa1 + 0.1;
                } else {
                    document.getElementById('pago').value = pago * tasa1;
                }

                //console.log('pago <0 ' + pay.value + ' pago ' + pago + ' aux ' + aux + ' tasa1 ' + tasa1 + ' eqbs ' +
                //    eqBs);
            } else {
                aux = 0;

                eqBs = (rest * tasa1).toFixed(2);

                resta.innerText = rest;
                document.getElementById('eqBs').innerText = eqBs;
                document.getElementById('eqBs').value = eqBs;
                document.getElementById('deud').value = eqBs;
                pago = (cambio - rest).toFixed(2);
                if (decimal != 0) {
                    pay.value = pago * tasa1 + aux + 0.1;
                } else {
                    pay.value = pago * tasa1 + aux;
                }

                //console.log('pago <0 ' + pay.value + ' pago ' + pago + ' aux ' + aux + ' tasa1 ' + tasa1 + ' eqbs ' +
                // eqBs);

            }
            vuelto.innerText = (n4);


        } else {
            if ((n4) > 0) { // solo se refleja deuda pendiente
                //console.log('debito2 ' + debito2 + ' esta pagando de menos');



                //rest=(cambio-parseInt(cambio)).toFixed(2);console.log('rest con '+rest-debito2);
                if (document.getElementById('diviza').value < cambio) {
                    checkbox1.checked = false;
                    checkbox1.checked = true;
                    checkbox1.checked = false;
                } else {
                    checkbox1.checked = true;
                }

                //console.log('resta: ' + rest + ' es menor que el monto n4>0 ' + ' n4= con debito' + deuda);
                console.log('debito2<=deuda' + ' debito2: ' + debito2 + ' deuda: ' + deuda);
                //
                if (debito2 <= deuda) {
                    debitarSi();
                    eqBs = deuda * tasa1;
                    //console.log('***deuda*** ' + deuda);
                    //console.log('debito:' + debito2 + ' deuda_decimal: ' + deuda + ' deuda_entera ' + n4);
                } else {
                    debito.max = deuda;
                    debito.innerText = ''; //console.log('oye tio'+debito2+' deuda: '+deuda);
                    debito.value = '';
                    alert('La cantidad debitada' + ' no puede ser mayor que ' + deuda);
                    eqBs = 0;
                }
                //deuda = deuda - debito2;

                rest = deuda;
                //console.log('***deuda***7 ' + deuda + ' eqBs ' + eqBs);
                vuelto.style.display = 'none';
                vuelto2.style.display = 'none';
                eq1.style.display = 'inline-block';
                document.getElementById('eqBs').style.display = 'inline-block';
                resta2.style.display = 'inline-block';
                debito.min = 0;
                debito.max = rest;
                resta.innerText = deuda;
                vuelto.innerText = (n4).toFixed(2);
                pago = (cambio - rest).toFixed(2);
                if (decimal != 0) {
                    pay.value = pago * tasa1 + 0.1;
                } else {
                    pay.value = pago * tasa1;
                }

                document.getElementById('eqBs').innerText = eqBs;
                document.getElementById('eqBs').value = eqBs;
                document.getElementById('deud').value = eqBs;
                //console.log('pago >0 ' + pago + ' camnbio ' + cambio + ' rest ' + rest + ' deuda ' + deuda +
                //    ' debito2 ' + debito2);
            }
        }
        if (n4 == 0) { //no tiene vuelto
            vuelto.style.display = 'none';
            vuelto2.style.display = 'none';
            resta2.style.display = 'inline-block';
            eq1.style.display = 'inline-block';
            document.getElementById('eqBs').style.display = 'inline-block';
            debito.disabled = false;
            debitarSi();
            if (checkbox1.checked) {
                resta.value = 0;
                deuda = 0;
            } else {
                resta.value = deuda;
            }
            deuda = parseFloat(deuda, 2);
            resta.innerText = deuda;
            debito.min = 0;
            debito.max = rest;
            //debito.disabled = true;
            document.getElementById('debito3').value = deuda;
            //console.log('resta con n4=0 ' + deuda + ' deuda-debito ' + debito);
            vuelto.innerText = (n4);
            pago = (cambio - deuda).toFixed(2);
            if (decimal != 0) {
                pay.value = pago * tasa1 + 0.1;
            } else {
                pay.value = pago * tasa1;
            }

            eqBs = (deuda * tasa1).toFixed(2);
            document.getElementById('eqBs').innerText = eqBs;
            document.getElementById('eqBs').value = eqBs;
            document.getElementById('deud').value = eqBs;
            //console.log('pago =0 ' + pago + ' camnbio ' + cambio + ' rest ' + deuda);

        }
        if (nn2 == "") {
            resta.innerText = '';
            //console.log('vacio ' + nn2);
            resta2.style.display = 'none';
            vuelto.style.display = 'none';
            vuelto2.style.display = 'none';
            debito2.value = "";

            document.getElementById('eqBs').style.display = 'none';
        }
        //resta.innerText=deuda;


        // const content = element.innerHTML;
    }
</script>
<!--PAGO EN BOLIVARES-->
<script type="text/javascript">
    const inlineRadio2 = document.getElementById('inlineRadio2');
    const parcialLabel = document.getElementById('parcialLabel');
    const parcialBs = document.getElementById('parcialBs');
    const divis11 = document.getElementById('divis1');
    const divis22 = document.getElementById('diviza');
    //document.getElementById('diviza').style.display='none';
    //divis11.style.display = 'none';
    //divis22.style.display = 'none';
    parcialLabel.style.display = 'none';
    parcialBs.style.display = 'none';
    inlineRadio2.addEventListener('click', mostrarpago);
    parcialBs.addEventListener('keyup', calcular);

    function calcular() {
        document.getElementById('diferenciaLabel').style.display = 'inline-block';
        document.getElementById('diferencia').style.display = 'inline-block';
        let paypal;
        let diferencia;
        let diferen;
        paypal = parseFloat(parcialBs.value);
        console.log('pay:' + paypal);
        let tot = document.getElementById("monto").value;
        total = parseFloat(tot);
        diferencia = (total - paypal).toFixed(2);
        console.log('diferencia');
        diferen = (total - paypal).toFixed(2);
        if (paypal < total) {
            document.getElementById('pagoLabel').innerText = 'Pago parcial';
        } else {
            document.getElementById('pagoLabel').innerText = 'Pagado Bs';
        }
        document.getElementById('pago').value = paypal;
        document.getElementById('diferencia').value = diferencia;
        document.getElementById('diferencia').innerText = diferencia;
        document.getElementById('diferen').value = diferen;

    }

    function mostrarpago() {
        //form.reset();
        parcialLabel.style.display = 'block';
        parcialBs.style.display = 'block';
        document.getElementById('checkbox1').style.display = 'none';
        document.getElementById('checkboxLabel').style.display = 'none';
        document.getElementById('eq1').style.display = 'none';
        document.getElementById('eqBs').style.display = 'none';
        document.getElementById('debito1').style.display = 'none';
        document.getElementById('debito3').style.display = 'none';
        document.getElementById('tasa1').style.display = 'none';
        document.getElementById('tasa').style.display = 'none';
        document.getElementById('debito3').value = '';
        document.getElementById('diviza').value = '';
        document.getElementById('pago').value = '';
        document.getElementById('eqBs').value = '';
        document.getElementById('vuelto').value = '';
        document.getElementById('resta').value = '';

    }
</script>
