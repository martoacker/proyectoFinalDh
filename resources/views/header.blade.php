<header >
  <nav style="display:flex; justify-content:space-between">

    <ul>
      <?php
      //  if(isset($_SESSION["nombre"]) && isset($_SESSION["apellido"]) && isset($_SESSION["mail"])){ ?>
          {{-- <li><a href="index.php">Mis Cursos</a></li>
          <li><a href="index.php">Crear Curso</a></li> --}}
      <?php // } ?>
    </ul>

    <ul>
      <li><a href="{{ route('inicio') }}">Home</a></li>

        <?php
        //if(isset($_SESSION["nombre"]) && isset($_SESSION["apellido"]) && isset($_SESSION["mail"])){ ?>
          <li><a href="perfil.php"><?php// echo $_SESSION["nombre"];?></a></li>
          {{-- <li><a href="logout.php">Logout</a></li> --}}
        <?php// }else{ ?>

          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Registro</a></li>
        <?php //} ?>
      <li><a href="{{ route ('faq')}}">Ayuda</a></li>
    </ul>
  </nav>
</header>
