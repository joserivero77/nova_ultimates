<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>

    <div class="container">
        <div class="dropdown">
            <div class="alert alert-primary col-12" role="alert">
                <div class="row">
                    <strong>
                        LISTADO DE PRODUCTOS
                    </strong>
                    <div class="row">
                        <div class=" col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                {{-- <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">Productos</h4>

                                        <div class="btn-group">
                                            <h4 class="card-title">
                                                <a href="">
                                                    <i class="fas fa-download"></i>
                                                    Exportar
                                                </a>
                                            </h4>
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" type="button" href="{{ route('products.create') }}">Agregar</a>

                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Action</button>

                                        </div>
                                        </div>
                                    </div> --}}



                                    <div class="table-responsive">
                                        <table table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripcion</th>
                                                    <th>Stock</th>
                                                    <th>Categoria</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $product)
                                                <tr>

                                                    <td>{{$product->name  }}</td>
                                                    <td>{{$product->description }}</td>
                                                    <td>{{$product->stock }}</td>
                                                    <td>{{$product->category->name}}</td>

                                                </tr>
                                                @endforeach


                                            </tbody>

                                        </table>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
