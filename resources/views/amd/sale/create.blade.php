@extends('layouts.amd')
@section('title'.'Registro de Ventas')
@section('styles')
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Registro de Ventas</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel Administrador</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Ventas</li>
          </ol>
        </nav>
    </div>
    <div class="row">
        <div class=" col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'sales.store', 'method'=>'post']) !!}
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Ventas</h4>
                    </div>
                </div>

                @include('amd.sale._form')


            </div>
            <div class="card-footer text-muted">
                <button type="submit" id="guardar" class="btn btn-primary float-right" style="font-size: 1rem;">Registrar</button>
                <a href="{{ route('sales.index') }}" class="btn btn-danger">Cancelar</a>

            </div>
            {!! Form::close() !!}
        </div>

    </div>

</div>
@endsection
@section('scripts')

<script>
$(document).ready(function(){
    $('#agregar').click(function(){
        agregar();
    });
});

var cont=1;
total=0;
subtotal=[];
$("#guardar").hide();
$("#product_id").change(mostrarValores);
function mostrarValores(){
    datosProducto=document.getElementById('product_id').value.split('_');
    $('#price').val(datosProducto[2]);
    $('#stock').val(datosProducto[1]);
}
function agregar(){
    datosProducto=document.getElementById('product_id').value.split('_');

    product_id=datosProducto[0];
    producto=$("#product_id option:selected").text();
    quantity=$("#quantity").val();
    discount=$("#discount").val();
    price=$("#price").val();
    stock=$("#stock").val();
    impuesto=$("#tax").val();console.log(impuesto);

    if(product_id !="" && quantity != "" && quantity>0 && price !=""){
        if(parseInt(stock)>=parseInt(quantity)){console.log(cont);
            subtotal[cont]=(quantity*price)-(quantity*price*discount/100);
            total=total+subtotal[cont];
        var fila='<tr class="selected" id="fila'+ cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+ cont +'); "><i class="fa fa-times"></i></button></td><td><input type="hidden" name="product_id[]" value="'+ product_id + '">'+ producto +'</td><td><input type="hidden" id="price[]" name="price[]" value="'+ parseFloat(price).toFixed(2) + '"><input class="form-control" type="number" id="price[]" value="'+ parseFloat(price).toFixed(2) +'" disabled></td><td><input type="hidden" name="discount[]" value="'+ parseFloat(discount).toFixed(2) +'"><input class="form-control" type="number" value="'+ parseFloat(discount) +'" disabled></td><td><input type="hidden" name="quantity[]" value="'+ quantity +'"><input class="form-control" type="number" value="'+ quantity +'" disabled></td><td align="right">'+ parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';

            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
            }else{
                Swal.fire({
                    type: 'error',
                    tetxt: 'La cantidad a vender supera el stock.'
                })
            }
        }else{
                Swal.fire({
                    type: 'error',
                    tetxt: 'Rellene todos los campos del formulario detalles de la venta.'
                })
            }

    }
    function limpiar(){
        $("#quantity").val("1");
        $("#discount").val("0");
        $("#price").val("");
    }

    function totales(){
        $("#total").html("Bs "+ total.toFixed(2));
        total_impuesto=total*impuesto/100;
        total_pagar=total+total_impuesto;
        console.log('total_pagar:');
        console.log(total_pagar);
        $("#total_impuesto").html("Bs "+ total_impuesto.toFixed(2));
        $("#total_pagar_html").html("Bs "+ total_pagar.toFixed(2))
        $("#total_pagar").val(total_pagar.toFixed(2));

    }

    function evaluar(){
        if(total>0){
            console.log(total_pagar);
            $("#guardar").show();
        }else{
            $("#guardar").hide();
        }
    }
    function eliminar(index){
        total=total-subtotal[index];
        total_impuesto=total*impuesto/100;
        total_pagar_html=total+total_impuesto;
        $("#total").html("Bs "+total);
        $("#total_impuesto").html("Bs "+total_impuesto);
        $("#total_pagar_html").html("Bs "+total_pagar_html);
        $("#total_pagar").val(total_pagar_htmml.toFixed(2));
        $("#fila"+index).remove();
        evaluar();

    }
</script>

@endsection
