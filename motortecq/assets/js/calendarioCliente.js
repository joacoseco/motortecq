

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
        events:"../server/controlador/calendarioCont.php?view=2",
        displayEventTime:'true',
        eventDisplay:'block',

        editable: true,

        eventClick: function(arg) {            
            var title = arg.event.title; 
            if(title=="Disponible"){
                reservar(arg);                    
            }    
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
        var rut  = $('#rutSpan').text();
        var id  = $('#idSpan').text();
        var motivo  = $('#motivoTxt').val();
        var servicio = $('#servicioSelect').val(); 
        $.ajax({
            url:"../server/controlador/calendarioCont.php",
            type:"post",
            data:{
                caso:'reservar',
                id:id,
                rut:rut,
                title:"Reservado",
                color:"#ffc107",
                motivo:motivo,
                servicio:servicio
            }
        }).done(function(response){ console.log(response);
            data = JSON.parse(response);
            if(data['val']==true){
                alert("su reserva ha sido realizada con exito");
                location.reload();
            }
            
        });
    });
});


function reservar(arg){
    var dia = new moment(arg.event.start);
    var end = new moment(arg.event.end); 
    $("#startTxt").val(dia.format("HH:mm"));    
    $("#endTxt").val(end.format("HH:mm"));  
    $("#fechaTitle").text(dia.format('D MMMM YY'));
    $("#idSpan").text(arg.event.id); 
    $('#reservaModal').modal('toggle');
}

