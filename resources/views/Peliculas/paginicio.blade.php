<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>PROYECTO PELICULA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- Owl Carousel css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- jquery css-->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  {{-- carousel js--}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  
  <div>
    @yield('contenido')
  </div>

  {{-- PIE DE PAGINA --}}
  <footer>
    <p class="legal">Copyright (c) 2021 Copyright Holder All Rights Reserved | This template is made By <i class="fas fa-heart"></i> Dot Studio</p>
  </footer>

  <script>
      var menuitem = document.getElementById("menuitem");
    menuitem.style.maxHeight = "0px";

    function menutoggle() {
      if (menuitem.style.maxHeight == '0px') {
        menuitem.style.maxHeight = "200px"
      } else {
        menuitem.style.maxHeight = "0px"
      }
    }

    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 50);
    })


    function playTrailer(trailerUrl) {
        var videoId = getYouTubeVideoId(trailerUrl);
        var youtubeUrl = 'https://www.youtube.com/embed/' + videoId;
        document.getElementById('youtubePlayer').setAttribute('src', youtubeUrl);
        document.getElementById('trailerPlayer').style.display = 'block';
    }

    function getYouTubeVideoId(url) {
        var videoId = '';
        var regex = /[?&]v=([^&#]*)/;
        var match = regex.exec(url);
        if (match && match[1]) {
            videoId = match[1];
        }
        return videoId;
    }

    function closeTrailer() {
        document.getElementById('youtubePlayer').setAttribute('src', '');
        document.getElementById('trailerPlayer').style.display = 'none';
    }

    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 20,
      nav: true,
      dots: false,
      responsive: {
        414: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    })

    $('.owl-carousel2').owlCarousel({
      loop: true,
      margin: 20,
      dots: true,
      items: 1
    })

    //pregunta eliminar 
    const deleteLinks = document.querySelectorAll(".delete-link");
    // Agregar evento onclick a cada enlace
    deleteLinks.forEach(link => {
        link.onclick = function (event) {
            event.preventDefault();
            const movieId = this.getAttribute("data-id");

            // Utilizar SweetAlert2 para mostrar el cuadro de diálogo
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirmó, redirige a la URL para eliminar la película
                    window.location.href = "{{ route("pelicula.destroyadmin", ['id' => '__movieId__']) }}".replace('__movieId__', movieId);
                }
            });
        };
    });

    $(document).ready(function() {
        $('.box-container-1').on('mouseenter', function() {
            $(this).find('.play-button').fadeIn();
            $(this).find('.text-bottom').fadeIn();
        }).on('mouseleave', function() {
            $(this).find('.play-button').fadeOut();
            $(this).find('.text-bottom').fadeOut();
        });
    });
    


    // Vue.js para cargar el formulario de inicio de sesión
    document.getElementById('showLoginForm').addEventListener('click', function() {
            const loginFormContainer = document.getElementById('loginFormContainer');
            loginFormContainer.innerHTML = `
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="email" name="CORREO" placeholder="Correo electrónico" required>
                    <input type="password" name="CONTRASENA" placeholder="Contraseña" required>
                    <button type="submit">Iniciar Sesión</button>
                </form>
            `;
        });
  </script>

</body>
</html>