<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>{{$titulo}}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet"/>


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet"/>

    </head>
    <body>
        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="/" class="navbar-brand"><img src="{{asset('img/c-cocino.png')}}" width="65" height="65"/></a> 
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            
                        </div>
                        <div class="d-flex m-3 me-0">
                            <div class="box">
                                <form name="search" action="{{route('recetas.search')}}" method="GET">
                                    <input type="text" class="input" id="query" name="query" placeholder=" " 
                                        onblur="if(this.value == '') {this.classList.remove('expanded')}">
                                    <i class="fas fa-search"></i>
                                </form>
                            </div>
                            <a href="#" class="my-auto" id="perfil-icon">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                            @if(Auth::check())
                                <div id="menu-opciones" class="oculto">
                                    <div class="perfil-info">
                                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path ) }}" alt="Avatar" class="avatar"> <!-- Cambia path_to_avatar.jpg a tu imagen -->
                                        <div><span class="nickname">{{Auth::user()->nickname}}</span></div> <!-- Cambia Nickname al nombre real -->
                                        <div><span class="user-id">@ {{Auth::user()->name}}</span></div> <!-- Cambia @username al nombre de usuario -->
                                    </div>
                                    <ul>
                                        <li><a href="{{route('usuario.myProfile',Auth::user()->id)}}">Tu perfil</a></li>
                                        <li><a href="{{route('receta.create')}}"></i> Crear receta</a></li>
                                        <li><a href="{{route('receta.index')}}"></i> Mis recetas</a></li>
                                        @if(Auth::user()->moderador==true)
                                            <li><a href="#"></i>Moderador</a></li>                                           
                                        @endif
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); this.closest('form').submit(); document.getElementById('logout').submit();">Cerrar sesion</a></li>
                                        </form>
                                    </ul>
                                </div>
                            @else
                                <div id="menu-opciones" class="oculto">
                                    <ul>
                                        <li><a href="{{route('register')}}"><i class="fas fa-user"></i>Registrarse</a></li>
                                        <li><a href="{{route('login')}}"><i class="fas fa-user"></i>Iniciar sesión</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
            <div class="hr">
                <hr>
            </div>
        </div>
        <!-- Navbar End -->
            
        {{$slot}}


    </body>
            
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    
        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    </footer>
</html>