
<!doctype html>
<html lang="en">

<head>
  <title>Editar</title>
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
        <section class="container mt-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h1>Actualizar Película</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pelicula.update', $pelicula->ID) }}">
                        @csrf
                        @method('PUT')
                        <label class="form-label" for="titulo">Título:</label>
                        <input class="form-control" type="text" id="titulo" name="TITULO" value="{{ $pelicula->TITULO }}" required>
                
                        <label class="form-label" for="sinopsis">Sinopsis:</label>
                        <textarea class="form-control" id="sinopsis" name="SINOPSIS" required>{{ $pelicula->SINOPSIS }}</textarea>
                
                        <label class="form-label" for="duracion">Duración:</label>
                        <input class="form-control" type="text" id="duracion" name="DURACION" value="{{ $pelicula->DURACION }}">
                
                        <label class="form-label" for="anio_lanzamiento_id">Año de Lanzamiento:</label>
                       {{--  <input class="form-control" type="number" id="anio_lanzamiento_id" name="anio_lanzamiento_id" value="{{ $pelicula->anio_lanzamiento_id }}"> --}}
                        <select class="form-select" name="anio_lanzamiento_id">
                            @foreach($anioLanzamientos as $anioLanzamiento)
                                <option value="{{ $anioLanzamiento->ID }}" {{ $pelicula->anio_lanzamiento_id == $anioLanzamiento->ID ? 'selected' : '' }}>
                                    {{ $anioLanzamiento->ANIO }}
                                </option>
                            @endforeach
                        </select>

                        <label class="form-label" for="clasificacion_id">Clasificación:</label>
                       {{--  <input class="form-control" type="text" id="clasificacion_id" name="clasificacion_id" value="{{ $pelicula->clasificacion_id }}"> --}}
                        <select class="form-select" name="clasificacion_id">
                            @foreach($clasificaciones as $clasificacion)
                                <option value="{{ $clasificacion->ID }}" {{ $pelicula->clasificacion_id == $clasificacion->ID ? 'selected' : '' }}>
                                    {{ $clasificacion->NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                        
                        <label class="form-label" for="portada_url">URL del Cartel:</label>
                        <input class="form-control" type="text" id="cartel_url" name="CARTEL_URL" value="{{ $pelicula->CARTEL_URL }}">

                        <label class="form-label" for="portada_url">URL de Portada:</label>
                        <input class="form-control" type="text" id="portada_url" name="PORTADA_URL" value="{{ $pelicula->PORTADA_URL }}">
                
                        <label class="form-label" for="trailer_url">URL de Trailer:</label>
                        <input class="form-control" type="text" id="trailer_url" name="TRAILER_URL" value="{{ $pelicula->TRAILER_URL }}">
                
                        <label class="form-label" for="actores">Actores:</label>
                        <select class="form-select form-select-sm" name="actores[]" multiple required>
                            @foreach($actores as $actor)
                                <option value="{{ $actor->ID }}" {{ in_array($actor->ID, $peliculaActoresIds) ? 'selected' : '' }}>
                                    {{ $actor->NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                
                        <label class="form-label" for="directores">Directores:</label>
                        <select class="form-select form-select-sm" name="directores[]" multiple required>
                            @foreach($directores as $director)
                                <option value="{{ $director->ID }}" {{ in_array($director->ID, $peliculaDirectoresIds) ? 'selected' : '' }}>
                                    {{ $director->NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                
                        <label class="form-label" for="formatos">Formatos:</label>
                        <select class="form-select form-select-sm" name="formatos[]" multiple required>
                            @foreach($formatos as $formato)
                                <option value="{{ $formato->ID }}" {{ in_array($formato->ID, $peliculaFormatosIds) ? 'selected' : '' }}>
                                    {{ $formato->NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                
                        <label class="form-label" for="generos">Generos:</label>
                        <select class="form-select form-select-sm" name="generos[]" multiple required>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->ID }}" {{ in_array($genero->ID, $peliculaGenerosIds) ? 'selected' : '' }}>
                                    {{ $genero->NOMBRE }}
                                </option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label class="form-label" for="idiomas">Idiomas:</label>
                            <select class="form-select form-select-sm" name="idiomas[]" multiple required>
                                @foreach($idiomas as $idioma)
                                    <option value="{{ $idioma->ID }}" {{ in_array($idioma->ID, $peliculaIdiomasIds) ? 'selected' : '' }}>
                                        {{ $idioma->IDIOMA }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                
                        <button class="btn btn-success" type="submit">Actualizar Película</button>
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