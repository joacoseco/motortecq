$(function () {
    $('#agregarBtn').click(function (e) {
        e.preventDefault();
        if(validar($('form:input'))==true){
            $.ajax({
                url:"controlador/usuarioCont.php",
                type:"post",
                data:{
                    caso:'agregar',
                    rut:$('#rutTxt').val(),
                    nombre:$('#nombreTxt').val(),
                    apellidoPaterno:$('#aPaternoTxt').val(),
                    apellidoMaterno:$('#aMaternoTxt').val(),
                    telefono:$('#telefonoTxt').val(),
                    email:$('#emailTxt').val(),
                    cargo:$('#cargotxt').val(),
                    permiso:$('#permisotxt').val()
                }
            }).done(function(response){
                var data = JSON.parse(response);
                if(data['val']==true){
                    alert("trabajador agregado exitosamente");
                    $("form :input").prop("value", "");
                    $('#cargotxt').val(0);
                    $('#permisotxt').val(0);

                    //recargar tabla
                }else{
                    alert(data['mensaje']);
                }
            });
        }
    });

    $('#cancelarBtn').click(function (e) {
        e.preventDefault();
        $("form :input").prop("value", "");
        $('#cargotxt').val(0);
        $('#permisotxt').val(0);
    });
});

function validar() {

    return true;

}