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
    <title>Crear Nueva Película</title>

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <section class="container mt-4 mb-4">
            <h1>Crear Nueva Película</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('pelicula.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título:</label>
                            <input class="form-control" type="text" id="titulo" name="TITULO" required>
                        </div>
            
                        <label for="sinopsis">Sinopsis:</label>
                        <textarea id="sinopsis" class="form-control" name="SINOPSIS" required></textarea>
            
                        <label for="duracion" class="form-label">Duración:</label>
                        <input class="form-control" type="text" id="duracion" name="DURACION">
            
                        <label for="anio_lanzamiento_id" class="form-label">Año de Lanzamiento:</label>
                        {{-- <input class="form-control" type="number" id="anio_lanzamiento_id" name="anio_lanzamiento_id"> --}}
                        <select class="form-select" name="anio_lanzamiento_id" id="anio_lanzamiento_id" required>
                            @foreach($anioLanzamientos as $anio)
                                <option value="{{ $anio->ID }}">{{ $anio->ANIO }}</option>
                            @endforeach
                        </select>

                        <label for="clasificacion_id" class="form-label">Clasificación:</label>
                        {{-- <input class="form-control" type="text" id="clasificacion_id" name="clasificacion_id"> --}}
                        <select class="form-select" name="clasificacion_id" id="clasificacion_id" required>
                            @foreach($clasificaciones as $clasificacion)
                                <option value="{{ $clasificacion->ID }}">{{ $clasificacion->NOMBRE }}</option>
                            @endforeach
                        </select>

                        <label for="portada_url" class="form-label">URL del Cartel:</label>
                        <input class="form-control" type="text" id="cartel_url" name="CARTEL_URL">
                        
                        <label for="portada_url" class="form-label">URL de Portada:</label>
                        <input class="form-control" type="text" id="portada_url" name="PORTADA_URL">
            
                        <label for="trailer_url" class="form-label">URL de Trailer:</label>
                        <input class="form-control" type="text" id="trailer_url" name="TRAILER_URL">
                        <div class="mb-3">
                            <label for="actores" class="form-label">Actores:</label>
                            <select class="form-select form-select-sm" name="actores[]" multiple required>
                                @foreach($actores as $actor)
                                    <option value="{{ $actor->ID }}">{{ $actor->NOMBRE }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <label for="directores" class="form-label">Directores:</label>
                        <select class="form-select form-select-sm" name="directores[]" multiple required>
                            @foreach($directores as $director)
                                <option value="{{ $director->ID }}">{{ $director->NOMBRE }}</option>
                            @endforeach
                        </select>
            
                        <label for="formatos" class="form-label">Formatos:</label>
                        <select class="form-select form-select-sm" name="formatos[]" multiple required>
                            @foreach($formatos as $formato)
                                <option value="{{ $formato->ID }}">{{ $formato->NOMBRE }}</option>
                            @endforeach
                        </select>
            
                        <label for="generos" class="form-label">Generos:</label>
                        <select class="form-select form-select-sm" name="generos[]" multiple required>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->ID }}">{{ $genero->NOMBRE }}</option>
                            @endforeach
                        </select>
            
                        <label for="idiomas" class="form-label">Idiomas:</label>
                        <select class="form-select form-select-sm" name="idiomas[]" multiple required>
                            @foreach($idiomas as $idioma)
                                <option value="{{ $idioma->ID }}">{{ $idioma->IDIOMA }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-success" type="submit">Guardar Película</button>
                        <a href="{{ route('pelicula.index') }}" class="btn btn-primary">Cancelar</a>
                    </form>
                </div>
                <div class="card-footer text-muted"></div>
            </div>
        </section>
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
