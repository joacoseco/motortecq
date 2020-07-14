<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FavIcon -->
    <link rel="icon" href="assets/img/favicon.ico" type="image/ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/164e1636ad.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/register.css">

    <title>MotorTecq</title>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
        <header>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top justify-content-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>  
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-fill w-100 text-center">
                    <li class="nav-item">
                        <i class="fas fa-arrow-circle-left text-white"><a class="nav-link" href="index.php"> VOLVER AL INICIO</a></i>
                    </li>
                </ul>
                </div>
            </nav>

        </header>
        <section class="container-fluid pt" style="margin-top:50px;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                    <div class="mx-auto text-center text-white mb-2">
                        <h1>Bienvenido a la MotorTecq</h1>
                        <img id="logo" src="assets/img/Logo1.png" alt="Logo1.png">
                    </div>
                    
                    <form action="" method="post">
                        <div class="card shadow p-3 rounded mx-auto col-lg-4 col-md-8 col-sm-12">
                            <div class="card-body">
                                <div class="form-group mx-auto col-lg-10 col-md-8 col-sm-12">
                                    <h2 for="tipoUsuario" align="center">Tipo de Usuario</h2>
                                    <select class="form-control" id="tipoUsuario">
                                        <option value="">Seleccione una opción...</option>
                                        <option value="empresa">Empresa</option>
                                        <option value="natural">Persona natural</option>
                                    </select>
                                    <button class="btn btn-info mt-3" type="button" id="boton_seleccionar">Seleccionar</button>
                                </div>
                            </div>
                        </div>


                        <div class="errores">

                        </div>
                        <div class="card mx-auto col-lg-8 col-md-8 col-sm-12 mt-4" id="registerForm">
                            <div class="card-header bg-dark text-white text-center shadow p-3 rounded">
                                <h1>Registrarse</h1>
                            </div>
                            <div class="card-body">
                                <p class="text-warning"><strong>La clave de usuario será el rut </strong></p>
                                <div class="form-row">
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label for="rut">Rut</label>
                                        <input type="text" class="form-control" id="rut" name="rut"
                                            placeholder="Rut" value="">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre"
                                            placeholder="Nombre" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label class="apellidoPaterno" for="apellidoPaterno">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="apellidoPaterno"
                                            placeholder="Apellido Paterno" value="">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6">
                                        <label class="apellidoMaterno" for="apellidoMaterno">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellidoMaterno"
                                            placeholder="Apellido Materno" value="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="telefono" class="col-form-label">Número de Contacto</label>
                                    <div class="input-group col-lg-3 col-md-6">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+569</span>
                                        </div>
                                        <input type="number" id="telefono" class="form-control rounded-right">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6 col-md-8 col-sm-12">
                                        <label for="correo" class="col-form-label">Correo</label>
                                        <input type="email" class="form-control" id="correo"
                                                placeholder="EJ: ejemplo@dominio.com" value="">
                                    </div>
                                </div>
                                <button class="btn btn-success" type="button" id="boton_registrar">Registrarse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <?php require_once "assets/templates/footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="assets/js/registrar.js"></script>
    </body>
</html>