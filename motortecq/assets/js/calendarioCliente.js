

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

        eventClick: function(arg) { // para cliente o modificaciones 
            var start = new moment(arg.event.start);
            var end = new moment(arg.event.end);
            console.log(start);
            console.log(end.format('HH:mm'));
            
        }
    });
    calendar.render();
});

$(function(){ 
    
    //boton cancelar 
    $('#cancelarBtn').click(function(e){
        e.preventDefault();
        $("form :input").prop("value", "");
        $("#text").text("");
        $('form input[type="radio":checked]').each(function(){
            $(this).prop('checked', false); 
        });        
    });

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
                        caso:'cerrado',
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
            case "1": //cuando se agregan manual
                //por programar
             /*   $.ajax({
                    url:"../server/controlador/calendarioCont.php",
                    type:"post",
                    data:{
                        caso:'agregar'
                    }
                }).done(function(response){
                    data = JSON.parse(response);
            
                });
                */
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
                        console.log(response);
                
                    });
                }
               
                break;     
            default:
                $('#text').text("Por favor escoja una opcion");
                break;
        }
    });
});


function eventClick(dia){    
    $('#disp1Div').hide();
    $('#disp2Div').hide();
    $('#fechaTitle').text(dia.format('D MMMM YY'));
    $('#dispModal').modal('toggle');
}

