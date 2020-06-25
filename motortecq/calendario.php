<?php require_once "assets/templates/header.php"; 
include "../server/db.php";

session_start();
date_default_timezone_set('America/Santiago');
// Unix
setlocale(LC_TIME, 'es_CL.UTF-8');
// En windows
setlocale(LC_TIME, 'spanish');
header('Content-Type: text/html; charset=UTF-8');

?>
    <link href='assets/fullcalendar-5.0.0/lib/main.css' rel='stylesheet' />

    
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <h2>Publicar disponibilidad</h2>
        <h3>Escoge el horario</h3>
        </div>
      </div>
      <div class="row">
        <div class="container" id='calendario'></div>
      </div>
    </div>

    <?php require_once "assets/templates/footer.php"; ?>
  </body>
<div class="modal" id="mymodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="header" class="modal-tittle"></h4>
                <button class="close" data-dismiss="modal"><span>X</span></button>
            </div>
            <div class="container">
                <div class=" modal-body">
                    <form action="">
                        <h6 id="fecha_title" ></h6>
                        <input type="text" hidden="" id="id">
                        <input type="text" hidden="" id="dia">

                        <div class="fecha form-group">
                            <label>Hora de inicio <span class="errorspan"id="s_hor1">*</span></label>
                            <input type="time" id="hora1"/>
                        </div>
                        <div class="fecha form-group">
                            <label>Hora de termino
                                <span class="errorspan"id="s_hor2">*</span></label>
                            <input type="time" id="hora2" min="" max="">
                        </div>
                        <div class="form-group">
                            <label for="">Tema
                                <span class="errorspan"id="s_tema">*</span></label>
                            <input id="tema" class="form-control" type="titulo">
                        </div>
                        <div class="form-group">
                            <label for="">Institucion</label>
                            <input id="inst" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Lugar</label>
                            <input id="lugar" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Observaciones</label>
                            <textarea id="obs" class="form-control" class="form-group" rows="5" id=""></textarea>
                        </div>
                        <button id="sub" class="btn">Guardar</button>


                        <button id="mod" class="btn btn-primary">Modificar</button>

                        <button id="del" class="btn btn-danger" >Eliminar</button>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <p id="text"></p>
            </div>
        </div>
    </div>
</div>


<script src='assets/fullcalendar-5.0.0/lib/main.js'></script>
<script src='assets/fullcalendar-5.0.0/lib/locales/es.js'></script>
<script src="assets/js/calendario.js"></script>

</html>
