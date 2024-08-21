<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar</title>
</head>
<body>
    <section class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1> AQUI EDITO LA VISTA</h1>
            </div>
            <div class="card-body">
                <label>Clasificacion</label>
                <form action="{{route('clasificacion.update', $nombre->ID)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="NOMBRE" required value="{{$nombre->NOMBRE}}">
                    <button class="btn btn-outline-primary" type="submit">Guardar</button>
                </form>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    </section>
</body>
</html>