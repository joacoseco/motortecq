$(function(){ 
    $('#ingresarBtn').click(function(e){
        e.preventDefault();
        var rut = $("#rut").val();
        var clave = $("#clave").val();

        if(rut=="" || clave ==""){
            $('#errorSpan').text("Por favor rellene todos los campos");
        }else{
            $.ajax({
                url:"../server/controlador/loginCont.php",
                type:"post",
                data:{
                    rut:rut,
                    clave:clave
                }
            }).done(function(response){
                data = JSON.parse(response);
                
                if(data['val']==false){
                    $('#errorSpan').text("usuario o clave incorrecta"); 
                }else{
                    window.location.href = "index.php"
                }
            });
        }
    });

});