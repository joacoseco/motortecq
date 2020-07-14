

//cargar calendario
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale:'es',
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events:"../server/controlador/calendarioCont.php?view=1",
        displayEventTime:'true',
        eventDisplay:'block',

        editable: true,
        selectable: true,

        eventClick: function(arg) { // para cliente o modificaciones 
            var start = new moment(arg.event.start);
            var end = new moment(arg.event.end);
            console.log(start);
            console.log(end.format('HH:mm'));
            
        },
        select: function(arg) {
            var dia = new moment(arg.start);
            var hoy = moment(dia).fromNow();
            if(hoy.indexOf('ago')==-1){
                if(arg.view.type=='dayGridMonth'){
                    daySelect(dia); 
                }else{
                    horaSelect(arg);
                }            
            }else{
                alert("Por favor seleccione dias posteriores a hoy");
            }
            calendar.unselect()   
        }
    });
    calendar.render();
});

$(function(){ 
    //al seleccionar un radio button del modal
    $('input[name="opRadio"]').click(function(){
        var opcion =$('input[name="opRadio"]:checked').val();
        
        switch(opcion){
            case "0": 
                $('#disp1Div').hide();
                $('#disp2Div').hide();
                break;
            case "1": 
                $('#disp1Div').show();
                $('#disp2Div').hide();
                break;
            case "2": 
                $('#disp1Div').hide();
                $('#disp2Div').show();
                break;           
        }
    });

    //boton cancelar disp
    $('#cancelarBtn').click(function(e){
        e.preventDefault();
        $("#dispForm :input").prop("value", "");
        $("#text").text("");
        $('#dispform input[type="radio":checked]').each(function(){
            $(this).prop('checked', false); 
        });        
    });

    //btn guardar disp
    $('#guardarBtn').click(function(e){
        e.preventDefault();
        var dia = new moment($("#fechaTitle").text());
        dia = dia.format('yyyy-MM-DD');

        var opcion =$('input[name="opRadio"]:checked').val();
        var repetir = $('#repetirTxt').val();
        switch(opcion){
            case "0": //marcar cerrado
                var start = new moment("09:00","HH:mm");
                var end = new moment("19:00","HH:mm");
                start = dia+" "+start.format("HH:mm");
                end = dia+" "+end.format("HH:mm");
                $.ajax({
                    url:"../server/controlador/calendarioCont.php",
                    type:"post",
                    data:{
                        caso:'agregar',
                        start:start,
                        end:end,
                        title:"Cerrado",
                        color:"#dc3545",
                        repetir:repetir
                    }
                }).done(function(response){
                    data = JSON.parse(response);
                    location.reload();
                });
                break;
            case "2":  //cuando se hace automatico            
                var startAl = $('#startAlTxt').val();
                var endAl = $('#endAlTxt').val();
                var duracion = $('input[name="duracionRadio"]:checked').val();
                var cantidadDiaria = $('#cantDiariaTxt').val();
                var val = true;
                var almuerzo;
                if(startAl !="" && endAl !="" && cantidadDiaria !=""){
                    var a= new moment(startAl,'HH:mm'); 
                    var b= new moment(endAl,'HH:mm'); 
                    almuerzo = moment.duration(b - a,).asHours();
                    var maximoAtencion = 10 - almuerzo;  
                    switch(duracion){
                        case '15':
                            if(maximoAtencion*4 < cantidadDiaria){
                                val = false;
                                $("#text").text("la cantidad de atenciones diarias escrita es mayor que la capacidad de atención, por favor cambiela a un numero menor que "+maximoAtencion*4);
                            }
                            break;
                        case '30':
                            if(maximoAtencion*2 < cantidadDiaria){
                                val = false;
                                $("#text").text("la cantidad de atenciones diarias escrita es mayor que la capacidad de atención, por favor cambiela a un numero menor que "+maximoAtencion*2);
                            }
                            break;
                        case '60':
                            if(maximoAtencion < cantidadDiaria){
                                val = false;
                                $("#text").text("la cantidad de atenciones diarias escrita es mayor que la capacidad de atención, por favor cambiela a un numero menor que "+maximoAtencion);
                            }
                            break;
                        default:
                            val=false;
                        break;
                    }
                }else{
                    val =false;
                }

                if(val == true){
                    $.ajax({
                        url:"../server/controlador/calendarioCont.php",
                        type:"post",
                        data:{
                            caso:'disp2',
                            startAl:startAl,
                            endAl:endAl,
                            duracion:duracion,
                            cantidadDiaria:cantidadDiaria,
                            title:'Disponible',
                            color:'#28a745',
                            repetir:repetir,
                            dia:dia
                        }
                    }).done(function(response){
                        //data = JSON.parse(response);
                        location.reload();
                
                    });
                }else{
                    $("#text").text("Por favor rellene todos los campos marcados con *");
                }
               
                break;     
            default:
                $('#text').text("Por favor escoja una opcion");
                break;
        }
    });

    //btn guardar hora
    $('#guardarHBtn').click(function(e){
        e.preventDefault();
        var val = true;
        
        var start = $('#startHTxt').val();
        var end = $('#endHTxt').val();
        var select = $('#dispSelect').val();
        var title ="";
        var color="";

        if(start=="" || end == ""  || select=='0'){
            val= false;
            $("#errorHModal").text("Escoja una opcion");
        }
        switch(select){
            case '0':
                val= false;
                $("#errorHModal").text("Escoja una opcion");
                break;
            case '1':
                title="Disponible";
                color="#28a745";
                break;
            case '2':
                title="En Colacion";
                color="#6c757d";
                break;
            case '3':
                title="Cerrado";
                color="#dc3545";
                break;
        }

        if(val==true){
            var dia = new moment($("#fechaHTitle").text());
            dia = dia.format('yyyy-MM-DD');
            start = dia+" "+start;
            end = dia+" "+end;
            $.ajax({
                url:"../server/controlador/calendarioCont.php",
                type:"post",
                data:{
                    caso:'agregar',
                    start:start,
                    end:end,
                    title:title,
                    color:color
                }
            }).done(function(response){
                console.log(response);
                //data = JSON.parse(response);
                location.reload();
            });
        }

    });
    //btn cancelar hora
    $('#cancelarHBtn').click(function(e){
        e.preventDefault();
        $("#horaForm :input").prop("value", "");
        $("#dispSelect").val("0");

    });
});


function daySelect(dia){    
    $('#disp1Div').hide();
    $('#disp2Div').hide();
    $('#fechaTitle').text(dia.format('D MMMM YY'));
    $('#dispModal').modal('toggle');
}

function horaSelect(arg){
    var dia = new moment(arg.start);
    $('#fechaHTitle').text(dia.format('D MMMM YY')); 
    var end = new moment(arg.end); 
    $("#startHTxt").val(dia.format("HH:mm"));    
    $("#endHTxt").val(end.format("HH:mm"));    
    
    $('#horaModal').modal('toggle');
}
