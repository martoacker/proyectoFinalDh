<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    {{-- <link rel="stylesheet" href="{{ URL::asset('css/estilos.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/footer.css') }}">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                      <img src="img/booklogo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                          {{-- {{ config('app.name', 'Laravel') }} --}}
                          <p class='willy'>Courses</p>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('inicio') }}">Inicio</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('faq') }}">Ayuda</a></li>
                        @else
                            <li><a href="{{ route('inicio') }}">Cursos</a></li>
                            <li><a href="{{ route('mostrarPerfil') }}">Mi Perfil</a></li>
                            <li><a href="{{ route('faq') }}">Ayuda</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </div>



    <div class="row">
      <div class="container-fluid">
      <div class="col-md-3">

            @isset($miPerfil)
                <div class="well well-sm">
                  <img src="{{ Storage::disk('public')->url( $miPerfil->avatar) }}" class="img-responsive"alt="Foto de perfil de {{$miPerfil->first_name}}">
                  <h4>{{$miPerfil->first_name}} {{$miPerfil->last_name}}</h4>

                </div>
                <hr>
            @endisset


        <h3 class="">Categoria</h3>
        <div class="">
             @isset($misCategorias)
               @foreach ($misCategorias as $categoria)
                   <a href="{{ route('cursosCategoria', ['id'=>$categoria->id]) }}">{{$categoria->title}}</a><br>
               @endforeach
             @endisset
        </div>


      </div>
      <div class="col-md-6">
        @yield('content')
      </div>
      <div class="col-md-3">
          <div class="">
            <h2 class="">DESTACADOS</h2>
          </div>

          @foreach ($cursosDestacados as $curso)
              <div class="col-md-12 thumbnail">
                <img src="{{ Storage::disk('public')->url( $curso->image) }}" alt="">
                <div class="caption">
                  <h3 id="">{{ $curso->title }}</h3>
                  <h5 id="">Ofrecido por: {{$curso->user->first_name}} {{$curso->user->last_name}}</h5>
                  <h5 id="">Categoria: {{$curso->category->title}}</h5>
                  <p><a href="{{route('curso', ['id'=>$curso->id])}}" class="btn btn-default btn-block" role="button">VER MÁS</a></p>
                </div>
              </div>
         @endforeach
      </div>
    </div>
</div>


<div class="row">
  <footer>
     <nav>
       <p class="text-center"> © 2017 <em>Todos los derechos reservados</em></p>
     </nav>
   </footer>
</div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
