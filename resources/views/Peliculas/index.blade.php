 @extends('Peliculas/paginicio')

 
@section('contenido')
 {{-- SECCION PARA LA PELICULA DE FONDO DE LA PANTALLA DE INICIO --}}
  <section class="home" style="background-image: url('{{ $peliculaReciente->PORTADA_URL }}');">
    <div class="headerbg ">
      <header>
        <div class="container ">
          <div class="navbar flex1">
            <div class="logo">
              <img src="{{ asset('imagen/logo.png') }}" alt="">
            </div>
          {{-- BARRA DE NAVEGACION --}}
          <nav>
            <ul id="menuitem">
              <li><a href="{{ route('pelicula.index') }}">INICIO</a></li>
              <li><a href="{{ route('pelicula.todas') }}">PELICULAS</a></li>
              <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">CATEGORIAS</a>
                <div class="dropdown-content">
                  @foreach($generos as $genero)
                    <a href="">{{$genero->NOMBRE}}</a>
                  @endforeach
                </div>
              </li>
            </ul>
          </nav>
            <span class="fa fa-bars" onclick="menutoggle()"></span>

            <div class="subscribe flex">
              <i class="fas fa-search"></i>
              <i id="palybtn" class="fas fa-user"></i>
            </div>
          </div>
        </div>
      </header>

      <div class="home_content mtop">
        <div class="container">
          <div class="left">
        
                <h1>{{$peliculaReciente->TITULO}}</h1>
  
            <div class="time flex">
              <label>{{$peliculaReciente->clasificacion->NOMBRE}}</label>
              <i class="fas fa-circle"></i>
              <span>{{$peliculaReciente->DURACION}}</span>
              <i class="fas fa-circle"></i>
              <p>{{$peliculaReciente->anio_lanzamiento->ANIO}}</p>
              <i class="fas fa-circle"></i>
                <div>
                    <p>
                        @foreach($peliculaReciente->generos as $genero)
                            {{ $genero->NOMBRE }}
                                @if (!$loop->last)
                                  &nbsp;&nbsp;
                                @endif
                                {{-- <button class="btn">
                                  {{ $genero->NOMBRE }}
                                  @if (!$loop->last)
                                    &nbsp;
                                  @endif
                                </button> --}}
                        @endforeach
                    </p>
                </div>
            </div>

            <p>{{$peliculaReciente->SINOPSIS}}</p>

          <div class="button flex">
                <button class="btn">PLAY NOW</button>
                <a href="#" onclick="playTrailer('{{ $peliculaReciente->TRAILER_URL }}')">
                    <i id="palybtn" class="fas fa-play"></i>
                </a>
                <p>VER TRAILER</p>
            </div>

          {{--   Aqui esta para hacer aparecer el reproductor de trailer --}}
          <div id="trailerPlayer">
            <button onclick="closeTrailer()" class="btncerrar">
                <span class="txtcerrar">X</span>
            </button>
            <iframe id="youtubePlayer" width="800" height="450" src="" frameborder="0" allowfullscreen></iframe>
          </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- SECCION PARA 10 PELICULAS AGREGADAS RECIENTEMENTE --}}
  <section class="popular mtop">
    <div class="container ">
      <div class="heading flex1">
        <h2>Agregadas Recientemente</h2>
      </div>
      <div class="owl-carousel owl-theme">
        @foreach($peliculaCarroselRecientes as $pelicula)
          <div class="item">
            <div class="box" > {{-- contiene la informacion parte debajo de la imagen --}}
              <div class="imgBox">
                <img src="{{ $pelicula->PORTADA_URL }}" alt="">
                <div class="icon">
                  <i class="far fa-heart"></i> {{-- icono corazon --}}
                  <i class="fas fa-share-alt"></i> {{-- icono compartir --}}
                  <i class="fas fa-plus"></i> {{-- icono mas --}}
                </div> 
              </div>

              <div class="content">
                <a href="{{ route("pelicula.detalles", $pelicula->ID) }}" style="color:white;">
                  <i id="palybtn" class="fas fa-play">
                  </i>
                </a>
              </div>
              <div class="text">
                <h3>{{ $pelicula->TITULO }}</h3>
                <div class="time flex">
                  <span>{{ $pelicula->DURACION }}</span>
                  <i class="fas fa-circle"></i>
                  <span style="color:#E50916">
                  {{--  @foreach($pelicula->generos as $genero)
                                    {{ $genero->NOMBRE }}
                                    @if (!$loop->last)
                                        &nbsp;
                                    @endif
                            @endforeach --}}
                    {{ $pelicula->generos->first()->NOMBRE }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 10 PELICULAS DE ACCION --}}
  <section class="popular mtop">
    <div class="container ">
      <div class="heading flex1">
        <h2>Peliculas de Accion</h2>
        <button>VER MAS</button>
      </div>
      <div class="owl-carousel owl-theme">
        @foreach($peliculaCarroselAccion as $pelicula)
          <div class="item">
            <div class="box" > {{-- contiene la informacion parte debajo de la imagen --}}
              <div class="imgBox">
                <img src="{{ $pelicula->PORTADA_URL }}" alt="">
                <div class="icon">
                  <i class="far fa-heart"></i> {{-- icono corazon --}}
                  <i class="fas fa-share-alt"></i> {{-- icono compartir --}}
                  <i class="fas fa-plus"></i> {{-- icono mas --}}
                </div> 
              </div>

              <div class="content">
                <a href="{{ route("pelicula.detalles", $pelicula->ID) }}" style="color:white;">
                  <i id="palybtn" class="fas fa-play">
                  </i>
                </a>
              </div>
              <div class="text">
                <h3>{{ $pelicula->TITULO }}</h3>
                <div class="time flex">
                  <span>{{ $pelicula->DURACION }}</span>
                  <i class="fas fa-circle"></i>
                  <span style="color:#E50916">
                  {{$pelicula->anio_lanzamiento->ANIO}}
                  </span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 10 PELICULAS DE TERROR --}}
  <section class="popular mtop">
    <div class="container ">
      <div class="heading flex1">
        <h2>Peliculas de Terror</h2>
        <button>VER MAS</button>
      </div>
      <div class="owl-carousel owl-theme">
        @foreach($peliculaCarroselTerror as $pelicula)
          <div class="item">
            <div class="box" > {{-- contiene la informacion parte debajo de la imagen --}}
              <div class="imgBox">
                <img src="{{ $pelicula->PORTADA_URL }}" alt="">
                <div class="icon">
                  <i class="far fa-heart"></i> {{-- icono corazon --}}
                  <i class="fas fa-share-alt"></i> {{-- icono compartir --}}
                  <i class="fas fa-plus"></i> {{-- icono mas --}}
                </div> 
              </div>

              <div class="content">
                <a href="{{ route("pelicula.detalles", $pelicula->ID) }}" style="color:white;">
                  <i id="palybtn" class="fas fa-play">
                  </i>
                </a>
              </div>
              <div class="text">
                <h3>{{ $pelicula->TITULO }}</h3>
                <div class="time flex">
                  <span>{{ $pelicula->DURACION }}</span>
                  <i class="fas fa-circle"></i>
                  <span style="color:#E50916">
                  {{$pelicula->anio_lanzamiento->ANIO}}
                  </span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  
<div id="loginFormContainer"></div>
@endsection
