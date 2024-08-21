@extends('Peliculas/paginicio')

 
@section('contenido')
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
<h1 class="txtcartelera">CARTELERA</h1>
<div class="cuad_contenido">
    <section class="movies-container">
        @foreach($peliculas as $pelicula)
            <div class="box-container-1" style="background-image: url('{{ $pelicula->CARTEL_URL }}');">
                <div class="play-button">
                    <a href="{{ route("pelicula.detalles", $pelicula->ID) }}" class="fondo">
                        <i id="btnplay" class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </section>
    <div class="pagination">
            {{ $peliculas->appends(request()->query())->links('pagination::bootstrap-4') }} 
    </div>
</div>


@endsection