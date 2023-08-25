<form action="" method="post" enctype="multipart/form-data" id="formulario">
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade text-left" id="createmodal" tabindex="-1" data-bs-keyboard="true" data-backdrop="static"
role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-primary text-center" id="modalTitleId"><i class=" fa fa-money-bill"></i>Forma de Pago</h2>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class=" col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open(['route'=>'categories.store', 'method'=>'post']) !!}
                            @csrf
                            <div class="mb-1">
                                <label for="" class="form-label text-danger">Monto Bs </label>
                              <label for="" class="form-label text-white badge-dark " id="monto"><h3><b> {{number_format($total, 2)}}</b></h3></label>
                            </div>

                                <div class="mb-1">
                                    <label for="" class="form-label">Tasa de cambio</label>
                                    <input type="text" name="" id="tasa" class="form-control" placeholder="" aria-describedby="helpId">
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label text-primary" for="inlineRadio1">Referencia $</label>
                                        </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label text-primary"  for="inlineRadio2">Efectivo Bs</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="checkbox1" name="checkbox1" value="option1">
                                            <label class="form-check-label text-primary" for="">Debito Bs</label>
                                          </div>
                                    </div>
                                </div>



                                <div class="mb-1">
                                    <label for="" class="form-label" id="divis1">Divisa en efectivo $</label>
                                    <input type="text" name="divisa" id="diviza"  class="form-control" placeholder="" aria-describedby="helpId">
                                    <label for="" class="form-label" id="debito1">Monto Debito Bs</label>
                                    <input type="text" name="debito2" id="debito3"  class="form-control" placeholder="" aria-describedby="helpId">

                                </div>
                                  <div class="mb-1">
                                    <label for="vuelto" class="form-label" id="vuelto2"><small><b>Vuelto: $<label class="text-info" id="vuelto"></label></b></small></label>
                                    <label for="" class="form-label" id="resta2"><small><b>Resta: $<label class="text-danger" id="resta"></label></b></small></label>
                                </div>

                                  <div class="mb-1">
                                    <label for="" class="form-label">Abono $ Bs</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                  <div class="mb-1">
                                    <label for="" class="form-label">Pago total $ Bs</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>

<br>











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
<script type="text/javascript">
const divis1=document.getElementById('divis1');
const divis2=document.getElementById('diviza');
const inlineRadio1=document.getElementById('inlineRadio1');
divis1.style.display='none';
divis2.style.display='none';
vuelto.style.display='none';
vuelto2.style.display='none';
resta2.style.display='none';
inlineRadio1.addEventListener('click',divisa);
inlineRadio2.addEventListener('click',Bs);

function divisa(){
    if(inlineRadio1.checked=true){
        console.log('divisa');
        divis1.style.display='block';
        divis2.style.display='block';
        vuelto.style.display='inline-block';
        vuelto2.style.display='inline-block';
        resta2.style.display='inline-block';
    }
}
function Bs(){
    if(inlineRadio2.checked=true){

        console.log('bs');
        divis1.style.display='none';
        divis2.style.display='none';
        vuelto.style.display='none';
        vuelto2.style.display='none';
        resta2.style.display='none';
    }
}
</script>
<script type="text/javascript">
var n1=document.getElementById('monto');
var n2=document.getElementById('diviza');
const btn=document.getElementById('boton');
const vuelto=document.getElementById('vuelto');
const vuelto2=document.getElementById('vuelto2');
const resta=document.getElementById('resta');
const checkbox1=document.getElementById('checkbox1');
var debito=document.getElementById('debito3');
const debito1=document.getElementById('debito1');
const debito3=document.getElementById('debito3');
debito1.style.display='none';
debito3.style.display='none';
n2.addEventListener('keyup', restar);
debito.addEventListener('keyup',restar);
checkbox1.addEventListener('click',mostrarDebito);


let debito2;
function sumar(){
    const deb=debito.value;
    debito2=parseFloat(deb);
//

}
function mostrarDebito(){
        console.log('chequed');


        //
if(checkbox1.checked=false){
    debito1.style.display='none';
    debito3.style.display='none';
}
debito1.style.display='block';
        debito3.style.display='block';




}
function ocultarDebito(){
        debito1.style.display='block';
        debito3.style.display='block';
}
//console.log('entra: '+debito2);
function restar(){
    const deb=debito.value;
    if(deb!=""){
        debito2=parseFloat(deb);
    }else{
        debito2=0;
    }


    const nn1=n1.value;
    const nn2=n2.value;

    let n3; let n4;let rest;
    n3=parseFloat(nn1)-parseFloat(nn2);
    n4=parseInt({{ $total }})-parseFloat(nn2);
    deuda=({{ $total }}-parseFloat(nn2)).toFixed(2);
    deuda=deuda-debito2;console.log('d:'+debito2);
    if(n4<0){
        vuelto.style.display='inline-block';
        vuelto2.style.display='inline-block';

        rest=({{ $total }}-parseInt({{ $total }})).toFixed(2);

       // requiere dar vuelto
            n4=n4*(-1);

        console.log('rest>0.5 '+rest+' n4<0 '+n4);
        resta.innerText=rest;
        vuelto.innerText=(n4);
    }else{
        if((n4)>0){// solo se refleja deuda pendiente
            console.log('debito2 '+debito2);


                rest=({{ $total }}-parseInt({{ $total }})).toFixed(2);console.log('rest con '+rest-debito2);


            rest=(deuda);

            console.log('resta: '+rest+' es menor que el monto n4>0 '+' n4= con debito'+deuda);

            vuelto.style.display='none';
            vuelto2.style.display='none';
            resta2.style.display='inline-block';
            resta.innerText=rest;
            vuelto.innerText=(n4);
        }
    }
    if(deuda==0){//no tiene vuelto
        vuelto.style.display='none';
        vuelto2.style.display='none';
        resta2.style.display='inline-block';
        factor=1;
        rest=({{ $total }}).toFixed(2);
        resta.innerText=deuda;
        //rest=(parseInt({{ $total }})-{{ $total }}).toFixed(2);
        console.log('rest con n4=0 '+rest+' deuda-debito '+deuda-debito);
        vuelto.innerText=(n4);
        resta.innerText=deuda;
    }
    if(nn2==""){
        resta.innerText=''; console.log('vacio '+nn2);
        resta2.style.display='none';
    }
    //resta.innerText=deuda;


    // const content = element.innerHTML;
}

</script>



