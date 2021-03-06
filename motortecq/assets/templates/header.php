<?php
  require "../server/trabajador.php";
  require "../server/cliente.php";

  session_start();

  if(isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
    $permiso = $usuario->getPermiso();
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FavIcon -->
    <link rel="icon" href="assets/img/favicon.ico" type="image/ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/164e1636ad.js" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <title>MotorTecq</title>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <header>
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-fill w-100 text-center">
            <li class="nav-item">
              <a class="nav-link" href="index.php#presentation">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#services">SERVICIOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#frecuentUsers">CLIENTES FRECUENTES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#contact">CONTACTO</a>
            </li>
            <?php if(!isset($_SESSION['usuario'])){ ?>
                <!-- TODO: Meter boton dentro de un IF de PHP para mostrar u ocultar -->
                <li class="nav-item">
                  <a class="nav-link" href="login.php">INICIAR SESIÓN</a>
                </li>

                <!-- TODO: Meter boton dentro de un IF de PHP para mostrar u ocultar -->
                <li class="nav-item">
                  <a class="nav-link" href="register.php">REGISTRARSE</a>
                </li>
            <?php }else{ ?>
                <li class="nav-item">
                <a class="nav-link" href="logout.php">Cerrar sesion</a>
              </li>
            <?php } 
            
            if(isset($_SESSION['usuario'])){
                switch($permiso){
                  case 1: //admin ?>
                    <!-- TODO: Meter boton dentro de un IF de PHP para mostrar u ocultar -->
                    <li class="nav-item">
                      <a class="nav-link" href="usuario.php">AGREGAR TRABAJADORES</a>
                    </li>
                    <!-- TODO: Meter boton dentro de un IF de PHP para mostrar u ocultar -->
                    <li class="nav-item">
                      <a class="nav-link" href="calendario.php">PUBLICAR DISPONIBILIDAD</a>
                    </li>
                <?php  break;
                  case 2: //cliente ?>
                    <!-- TODO: Meter boton dentro de un IF de PHP para mostrar u ocultar -->
                    <li class="nav-item">
                      <a class="nav-link" href="calendarioCliente.php">Reservar Hora de atencion</a>
                    </li>
               <?php   break;
                }
            }     
            if(isset($_SESSION['usuario'])){ ?>              
              <li class="nav-item">
                <p>Bienvenido <?php echo $usuario->nombreCompleto() ?> </p>
              </li>
            <?php } ?>
          </ul>
        </div>
        
      </nav>

    </header>