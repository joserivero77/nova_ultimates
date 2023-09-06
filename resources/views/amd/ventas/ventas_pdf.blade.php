<!DOCTYPE html>
<html>
<head>
    <title>Detalle de venta</title>
    <style>
        /* Estilos CSS personalizados para la factura */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <h1>Detalle de venta Nº1</h1>
            <h1>Cliente: <small><b>Nombre del cliente</b></small></h1>
            <a class="btn btn-info" href="#">Volver</a>
            <a class="btn btn-success" href="#">Reporte</a>
            <h2>Productos</h2>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Cod. Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">Código de producto</a></td>
                            <td>Descripción del producto</td>
                            <td>Bs100.00</td>
                            <td>2</td>
                            <td>Bs200.00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>SubTotal</strong></td>
                            <td>Bs200.00</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>I.V.A (16,0%)</strong></td>
                            <td>Bs32.00</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>Total</strong></td>
                            <td>Bs232.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
