$(function () {
    $('#agregarBtn').click(function (e) {
        e.preventDefault();
        if(validar($('form:input'))==true){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
              
              swalWithBootstrapButtons.fire({
                title: 'Confirme los siguientes datos:',
                text:   'Rut: '+ $('#rutTxt').val()+"\n"
                        + 'Nombre: '+$('#nombreTxt').val()+"\n"
                        + 'Apellido Paterno: '+$('#aPaternoTxt').val()+'\n'
                        + 'Apellido Materno: '+$('#aMaternoTxt').val()+'\n'
                        + 'Teléfono: '+$('#telefonoTxt').val()+'\n'
                        + 'Email: '+$('#emailTxt').val()+'\n'
                        + 'Cargo: '+$('#cargotxt').val()+'\n'
                        + 'Permiso: '+$('#permisotxt').val()+'\n',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, agregar.',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                    
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
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Usuario agregado exitosamente.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("form :input").prop("value", "");
                            $('#cargotxt').val(0);
                            $('#permisotxt').val(0);
        
                            //TODO:recargar tabla
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data['mensaje'],
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
              })
        }
    });

    $('#cancelarBtn').click(function (e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Está seguro que desea cancelar la operación?',
            text: "Los datos ingresados no serán guardados",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si.',
            cancelButtonText: 'No.'
        }).then((result) => {

            if (result.value) {
                Swal.fire(
                'Operación cancelada!',
                'warning'
                )
                $("form :input").prop("value", "");
                $('#cargotxt').val(0);
                $('#permisotxt').val(0);
            }
        })
    });
});

function validar() {

    return true;

}