<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@section('titulo', 'Proyecto')</title>
</head>
<body>
    <section class="container mt-4">
        <h1>Lista de años de lanzamiento</h1>
        <div class="card mt-3">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('anio.create')}}" class="btn btn-outline-primary">Añadir Año</a>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-sm">
                            <thead class="table-dark">
                                <th>ID</th>
                                <th>AÑO DE LANZAMIENTO</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @foreach ($datos as $item)          
                                    <tr>
                                        <td> {{$item -> ID}} </td>
                                        <td> {{$item -> ANIO}} </td>
                                        <td>
                                            <form action="{{ route("anio.edit", $item->ID) }}" method="GET">
                                                <button class="btn btn-outline-secondary">Editar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route("anio.destroy",$item->ID)}}" method="GET">
                                                <button class="btn btn-outline-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        </div>
    </section>
</body>
</html>

