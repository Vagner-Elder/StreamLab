

@extends('Peliculas/paginicio')

@section('contenido')
	<section class="home" style="background-image: url('{{ $pelicula->PORTADA_URL }}');">
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
			
					<h1>{{$pelicula->TITULO}}</h1>
	  
				<div class="time flex">
				  <label>{{$pelicula->clasificacion->NOMBRE}}</label>
				  <i class="fas fa-circle"></i>
				  <span>{{$pelicula->DURACION}}</span>
				  <i class="fas fa-circle"></i>
				  <p>{{$pelicula->anio_lanzamiento->ANIO}}</p>
				  <i class="fas fa-circle"></i>
					<div>
						<p>
							@foreach($pelicula->generos as $genero)
								{{ $genero->NOMBRE }}								
									@if (!$loop->last)
										&nbsp;
									@endif								
							@endforeach
						</p>
					</div>
				</div>
	
				<p>{{$pelicula->SINOPSIS}}</p>
	
			  <div class="button flex">
					<button class="btn">PLAY NOW</button>
					<a href="#" onclick="playTrailer('{{ $pelicula->TRAILER_URL }}')">
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

@endsection