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
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        events:"controlador/calendarioCont.php?view=1",

        dateClick: function(arg) {
            console.log(arg);
        },
        eventClick: function(arg) {
            console.log(arg);
        }/*,
        select: function(arg) {
            probandomodal();
            var title = prompt('Event Title:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    color:'#FF5733',
                    allDay: arg.allDay
                })
            }
            calendar.unselect()
        }*/
    });
    calendar.render();
});

function probandomodal() {
    $('#mymodal').modal('toggle');
}


function calendario(){
    var data;
    $.ajax({
        url:"controlador/calendarioCont.php",
        type:"post",
        data:{
            caso:'agregar'
        }
    }).done(function(response){
        data = JSON.parse(response);

    });
    return data;
}