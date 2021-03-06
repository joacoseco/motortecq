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
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/error.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

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
                        <div class="card shadow p-3 rounded mx-auto" style="width:350px;">
                            <div class="card-header bg-dark text-white text-center shadow p-3 rounded">
                                <h1>Iniciar sesión</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="rut">Rut <span class="errorspan">*</span></label>
                                    <input type="text" class="form-control shadow p-3" id="rut" value=""onkeypress="return numeros(event,this)" onfocusout="puntosRut(event,this)" >
                                </div>
                                <div class="form-group">
                                    <label for="clave">Clave <span class="errorspan">*</span></label>
                                    <input type="password" class="form-control shadow p-3 bg-white rounded" id="clave" value="">
                                </div> <span class="errorspan" id="errorSpan">*</span>
                                <button class="btn btn-primary" name="ingresar_btn" id="ingresarBtn">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php require_once "assets/templates/footer.php"; ?>
        <script src="assets/js/login.js"></script>
        <script src="assets/js/rut.js"></script>
    </body>
</html>





















