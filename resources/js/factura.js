
const formDetalle = document.getElementById('formDetalle');
const inputCantidad = document.getElementById('inputCantidad');
const selectDescripcion = document.getElementById('selectDescripcion');
const inputPUnitario = document.getElementById('inputPUnitario');
const inputPTotal = document.getElementById('inputPTotal');
const cuerpoTabla = document.getElementById('cuerpoTabla');
const btnGuardar = document.getElementById('btnGuardar');
const formCabecera = document.getElementById('formCabecera');

let facturas= [];
let arregloDetalle = [];
let arregloProductos=[
    {id:1,nombre:"Producto1",precio:10.22},
    {id:2,nombre:"Producto2",precio:150.12},
    {id:3,nombre:"Producto3",precio:103.82},
    {id:4,nombre:"Producto4",precio:10.21},
    {id:5,nombre:"Producto5",precio:50.99},
    {id:6,nombre:"Producto6",precio:13.762},

];
    const verificarFacturasLocalStorage=()=>{
        const facturasLS=JSON.parse(localStorage.getItem("facturas"));
        facturas=facturasLS||[];
    };

    verificarFacturasLocalStorage();
    const llenarProductos=()=>{
        arregloProductos.forEach((p)=>{
        const option=document.createElement('option');
        option.value=p.id;
        option.innerText=p.nombre;
        selectDescripcion.appendChild(option);
        });   
    };

llenarProductos();

    const getPrecioProductoById=(id)=>{
        const objProducto=arregloProductos.find((p)=>{
            if(p.id===+id){
                return p;
            };
        });
        return objProducto.precio;
    };
    const getNombreProductoById=(id)=>{
        const objProducto=arregloProductos.find((p)=>{
            if(p.id===+id){
                return p;
            };
        });
        console.log(id);
        return objProducto.nombre;
    };

    

    

    const redibujarTabla= ()=>{
        cuerpoTabla.innerHTML="";
        arregloDetalle.forEach((detalle)=>{
    console.log(detalle.descripcion);
            let fila=document.createElement('tr');
            fila.innerHTML=`<td>${detalle.cant}</td>
            <td>${getNombreProductoById(detalle.descripcion)}</td>
            <td>${detalle.pUnit}</td>
            <td>${detalle.pTotal.toFixed(2)}</td>`;
            let botonEliminar=document.createElement('button');
            let tdEliminar=document.createElement('td');
            botonEliminar.classList.add('btn', 'btn-danger');
            botonEliminar.innerText='Eliminar';
            botonEliminar.onclick=()=>{
                eliminarDetalleById(detalle.descripcion);
            };
            tdEliminar.appendChild(botonEliminar);
            fila.appendChild(tdEliminar);
            cuerpoTabla.appendChild(fila);
        });
    };


    const eliminarDetalleById=(id)=>{
        arregloDetalle=arregloDetalle.filter((detalle)=>{
            if(+id!==+detalle.descripcion){
                return detalle;
            };

        });
        redibujarTabla();
    };
    const agregarDetalle=(objDetalle)=>{
        //buscar si el objeto detalle ya EXISTIA en el arregloDetalle
        // de ser asi, sumar las cantidades para que solo aparezca en el arreglo

        const resultado=arregloDetalle.find((detalle)=>{
            if(+objDetalle.descripcion===+detalle.descripcion){
                return detalle;
            };
        });

        if(resultado){
        arregloDetalle=arregloDetalle.map((detalle)=>{
            if(+detalle.descripcion===+objDetalle.descripcion){
                return{
                    cant:+detalle.cant+ +objDetalle.cant,
                    descripcion:detalle.descripcion,
                    pTotal:((+detalle.cant+ +objDetalle.cant)*+detalle.pUnit),
                    pUnit:+detalle.pUnit,
                };
            }
            return detalle;
        });
        }else{
            arregloDetalle.push(objDetalle);
        };
        //
    };

    formDetalle.onsubmit = (e) => {
        e.preventDefault();
        //creando el objeto detalle      
        const cant = inputCantidad.value;
        const descripcion = selectDescripcion.value;
        const pUnit = inputPUnitario.value;
        const pTotal = (inputPTotal.value);
        

        const objDetalle = {
            cant,
            descripcion,
            pUnit,
            pTotal,
        };
       /* const objDetalle = {
            cant : inputCantidad.value,
            descripcion : selectDescripcion.valu,
            pUnit : inputPUnitario.value,
            pTotal : inputPTotal.value,                       
         };*/
         agregarDetalle(objDetalle);
         redibujarTabla();
    };

  //console.log(objDetalle);
    

    btnGuardar.onclick=()=>{
        //crear el objeto de la cabecera factura
        let objFactura={
            nombre: inputNombre.value,
            direccion: inputDireccion.value,
            fecha: inputFecha.value,
            nro: inputNro.value,
            rif: inputRIF.value,
            detalle: arregloDetalle,
        };
        console.log(objFactura);
        facturas.push(objFactura);
        //limpiar campos
        formCabecera.reset();
        formDetalle.reset();
        //guardar en localStorage
        localStorage.setItem("facturas",JSON.stringify(facturas));
        //borrar el tbody
        arregloDetalle=[];
        redibujarTabla();
    };



        //selectDescripcion.onchange=()=>{inputPUnitario.value=precio;};
        selectDescripcion.onchange=()=>{
    
            if(selectDescripcion.value=="0"){
                formDetalle.reset();
            return;
            }
            console.log(selectDescripcion.value);
            const precio= getPrecioProductoById(selectDescripcion.value);
 
            if(precio){
                inputPUnitario.value=precio;
                calcularTotal();
            }
        };


        const calcularTotal=()=>{
            const cantidad=+inputCantidad.value;
            const pUnit=+inputPUnitario.value;
            const total=cantidad*pUnit;
            inputPTotal.value=total.toFixed(2);
        };

inputCantidad.onkeydown=()=>{calcularTotal();};
inputCantidad.onchange=()=>{calcularTotal();};



  //Enviar datos al servidor
  /*const url = '/api/factura';
  const data = {
    arregloDetalle,
  };

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  })
    .then(res => res.json())
    .then(data => {
      console.log(data);
    });*/
