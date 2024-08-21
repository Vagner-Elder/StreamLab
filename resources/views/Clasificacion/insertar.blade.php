<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inseratr</title>
</head>
<body>
    <section class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>INSERTAR CLASIFICACIONES</h2>
            </div>
            <div class="card-body">
                <form action="{{route('clasificacion.store')}}" method="POST">
                    @csrf
                    <label for="">Clasificación</label>
                    <input class="form-control" type="text" name="NOMBRE" required>
                    <button class="btn btn-outline-primary" type="submit">Agregar</button>
                </form>
            </div>
            <div class="card-footer text-muted"></div>
        </div>
    </section>
</body>
</html>

