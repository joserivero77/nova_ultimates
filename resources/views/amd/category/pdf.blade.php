<!doctype html>
<html lang="en">

<head>
  <title>Categorias</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<style>
h2{
    text-align: center;
}

.cabecera{
    background-color: blue;
    text-align: center;
    color: white;
}
.table{
    width: 100%;
    align-content: center;

}
.styled-table{
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 1em;
    font-family: sans-serif;
    min-width: 450px;
    box-shadow: 0 0 20px #2d10e826;
}
.styled-table thead tr{
    background-color: hsl(217, 87%, 47%);
    color: #ffffff;
    text-align: middle;
}
.styled-table th, .styled-table td{
    padding: 12px 15px;
}
.styled-table tbody tr{
    border-bottom: 1px solid #dddddd;

}
.styled-table tbody tr:nth-of-type(event){
    background-color: #f3f3f3;

}
.styled-table tbody tr:last-of-type{
    border-bottom: 2px solid #009879;
}
.styled-table td,th{
    border: 1px solid black;
}
</style>
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <img src="img/dnova3.jpg" alt="" width="100px" height="100px">
    <h2>Categoria</h2>
    <div class="table-responsive tabla">
        <table  class="table table-bordered content-table styled-table" id="dataTable" width="100%" cellspacing="0">
            <thead class="cabecera">
                <tr>

                    <th>Nombre</th>
                    <th>Descripcion</th>

                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>

                    <td>
                    {{$category->name  }}
                    </td>
                    <td>{{$category->description  }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
