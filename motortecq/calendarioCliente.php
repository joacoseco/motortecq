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
            <h2>Reserva de atención</h2>
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


  <!--reserva modal -->
<div class="modal" id="reservaModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="header" class="modal-tittle">Escoja el horario disponible que le acomode</h5>
                <h5 id="fechaTitle"></h5>
                <button class="close" data-dismiss="modal"><span>X</span></button>
            </div>
            <div class="container">
                <div class=" modal-body">
                    <form action="">
                        
                        <p id="text" class="errorspan"></p>
                        <button class="btn btn-primary" id="guardarBtn">Reservar</button>
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
<script src="assets/js/calendarioCliente.js"></script>

</html>
