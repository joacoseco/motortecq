<?php require_once "assets/templates/header.php"; ?>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Section -->
    <section class="container-fluid">
      <div class="row justify-content-md-center pt-4">
        <div class="d-flex justify-content-center" id="presentation">
          <div class="text-center" style="margin-top:150px;">
            <img id="logo1_2" class="rounded mx-auto" src="assets/img/Logo1.png" alt="Logo1.2.png">
            <h2 align="center" class="text-white">Motortecq - Servicio técnico automotriz</h2>
          <div>
        </div>

        <!-- Services -->
        <div class="d-flex justify-content-center">
          <div class="text-center" style="margin-top:250px;">
            <div id="services" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#servicess" data-slide-to="0" class="active"></li>
                <li data-target="#services" data-slide-to="1"></li>
                <li data-target="#services" data-slide-to="2"></li>
                <li data-target="#services" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/img/Servicios.PNG" class="d-block w-100" alt="Servicios.PNG">
                </div>
                <div class="carousel-item">
                  <img src="assets/img/Folleto.PNG" class="d-block w-100" alt="Folleto.PNG">
                </div>
                <div class="carousel-item">
                  <img src="assets/img/Elevador.png" class="d-block w-100" alt="Elevador.PNG">
                  <div class="carousel-caption">
                    <h4>Revisión de distintos vehículos</h4>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption">
                    <h4>Revisión de frenos</h4>
                  </div>
                  <img src="assets/img/Frenos.png" class="d-block w-100" alt="Frenos.PNG">
                </div>
              </div>
              <a class="carousel-control-prev" href="#services" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#services" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <h2 align="center" class="text-white">Servicios MotorTecq</h2>
          </div>
        </div>

        <!-- Frecuent Users -->
        <div class="d-flex justify-content-center">
          <div id="frecuentUsers" class="text-center" style="margin-top:250px;">
            <h2 align="center" class="text-white mt-3">Clientes frecuentes de MotorTecq</h2>
            <img src="assets/img/Clientes.png" class="" alt="Clientes.png">
            <img src="assets/img/LePUCV.PNG" class="" alt="LePUCV.PNG">
          </div>
        </div>

        <!-- Contact -->
        <div class="d-flex justify-content-center">
          <div style="margin-top:200px;">
            <div class="card text-center" id="contact">
              <div class="card-header text-white" style="background-image: linear-gradient(to bottom right, red , black, white);">
                <h2>Contactenos</h2>
                <p><strong>MotorTecq, Servicio Tecnico Automotriz</strong></p>
              </div>
              <div class="card-body m-2" id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3345.358191491283!2d-71.50425598481176!3d-33.020692480899065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689dea27013d655%3A0x4596443f9b0b7a05!2sCamino%20Internacional%205415%2C%20Vi%C3%B1a%20del%20Mar%2C%20Valpara%C3%ADso!5e0!3m2!1ses-419!2scl!4v1592026993879!5m2!1ses-419!2scl" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
              <div class="card-footer">
                <p><strong>Número de Contacto:</strong> +56 9 9743 6957</p>
                <p><strong>Correo electrónico de Contacto:</strong> motortecq.automotriz@gmail.com</p>
              </div>
            </div>
          </div>
        </div>
    </section>
    <?php require_once "assets/templates/footer.php" ?>
  </body>
</html>
