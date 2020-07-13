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
    <link href='assets/css/error.css' rel='stylesheet' />

    
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <h2>Publicar disponibilidad</h2>
            <h3>Escoge el horario</h3>
        </div>
        <div class="row">
            <div class="container" id='calendario'></div>
        </div>
        <div class="row ">
        <style>
            #leyendaList{
                list-style-type: none;
            }
            #leyendaList li{
                float: left;
                margin-right: 30px;
            }
            li span{
                width: 20px;
                height: 20px;
                float: left;
                margin: 2px;
            }
        </style>
            <div class="mt-5 container border rounded">
                <ul id="leyendaList" >
                    <li><!-- #28a745 --><span class="bg-success border rounded"></span>Disponible</li>
                    <li><!-- #ffc107 --><span class="bg-warning border rounded"></span>Reservado</li>
                    <li><!-- #dc3545 --><span class="bg-danger border rounded"></span>Cerrado</li>
                    <li><!-- #17a2b8 --><span class="bg-info border rounded"></span>En proceso</li>
                    <li><!-- #6c757d --><span class="bg-secondary border rounded"></span>En colación</li>
                </ul>
            </div>                
        </div> 
    </div>
    
    <?php require_once "assets/templates/footer.php"; ?>
  </body>

<!-- Disponibilidad por hora modal -->
<div class="modal" id="horaModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fechaHTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" id="horaForm">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="">Hora inicio</label>
                        <input type="time" class="form-control" id="startHTxt" >
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="">Hora termino</label>
                        <input type="time" class="form-control" id="endHTxt">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <label for="dispSelect">Seleccione</label>
                        <select class="form-control" id="dispSelect">
                            <option value="0" selected>Escoja una opcion</option>
                            <option class="bg-success" value="1">Disponible</option>
                            <option class="bg-secondary" value="2">En Colacion</option>
                            <option class="bg-danger" value="3">Cerrado</option>
                        </select>
                    </div>
                </div>
            </div>
            <p class="errorspan" id="errorHModal"></p>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  id="guardarHBtn">Aceptar</button>
        <button type="button" class="btn btn-danger" id="cancelarHBtn" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
  <!--disponibilidad modal -->
<div class="modal" id="dispModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="header" class="modal-tittle">Escoja la disponibilidad para el dia </h5>
                <h5 id="fechaTitle"></h5>
                <button class="close" data-dismiss="modal"><span>X</span></button>
            </div>
            <div class="container">
                <div class=" modal-body">
                    <form action="" id="dispform">
                        <label for="">Escoja una de las opciones <span class="errorspan">*</span></label>
                        <div class="eleccionRadio form-group">
                            <input id="cerrado" type="radio" name="opRadio" value="0">
                            <label for="cerrado">Cerrado todo el dia</label>
                            <input id="disp1" type="radio" name="opRadio" value="1" hidden>
                            <label for="disp1" hidden>Escojer por horas</label>
                            <input id="disp2" type="radio" name="opRadio" value="2">
                            <label for="disp2">configuración rapida</label>            
                        </div>
                        <div id="disp1Div">
                            <div class="row horaDiv">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="">Hora inicio</label>
                                        <input type="time" class=" startTxt form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="">Hora termino</label>
                                        <input type="time" class=" endTxt form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 justify-content-center align-self-center">
                                    <button class="btn btn-success +Btn">+</button>
                                    <button class="btn btn-danger xBtn">X</button> 
                                </div>
                            </div>   
                        </div>
                        <div id="disp2Div">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                    <label for="">Hora inicio almuerzo<span class="errorspan">*</span></label>
                                    <input type="time" id="startAlTxt" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="">Hora termino almuerzo<span class="errorspan">*</span></label>
                                        <input type="time" id="endAlTxt" class="form-control">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="">Cantidad de atenciones diarias<span class="errorspan">*</span></label>
                                        <input type="number" id="cantDiariaTxt" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <p>Duración de la atención <span class="errorspan">*</span></p>
                                        <input type="radio" name="duracionRadio" value="15" id="15radio">
                                        <label for="15radio">15 minutos</label>
                                        <input type="radio" name="duracionRadio" value="30" id="30radio">
                                        <label for="30radio">30 minutos</label>
                                        <input type="radio" name="duracionRadio" value="60" id="1radio">
                                        <label for="1radio">1 hora</label>
                                    </div>
                                </div>                                
                            </div>                            
                        </div>
                        <div id="repetirDiv" hidden> 
                            ¿Desea repetir esta configuración por los siguientes dias? 
                            <label for="repetirTxt">Escoja la cantidad de dias</label>
                            <div class="form-group col-md-4 col-sm-4">                                
                                <input id="repetirTxt" type="number" clasS="form-control" value="0">
                            </div>                            
                        </div>
                        <p id="text" class="errorspan"></p>
                        <button class="btn btn-primary" id="guardarBtn">Guardar</button>
                        <button class="btn btn-danger" id="cancelarBtn">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src='assets/fullcalendar-5.0.0/lib/main.js'></script>
<script src='assets/fullcalendar-5.0.0/lib/locales/es.js'></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/calendario.js"></script>

</html>
