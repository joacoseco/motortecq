const cargarTabla = () =>{
    const bodyTabla = document.querySelector('#bodyTabla');
    bodyTabla.innerHTML = "";
    $.ajax({
        url:"../server/controlador/usuarioCont.php",
        type:"post",
        data:{
            caso: "listar"
        }
    }).done(function(response){
        var data = JSON.parse(response);
            $.each(data, function( index, value ) {
                let permiso = data[index]['permiso'];

                if (data[index]['permiso'] == 1) {
                    data[index]['permiso'] = 'Administrador';
                }else if (data[index]['permiso'] == 2) {
                    data[index]['permiso'] = 'Cliente';
                }else if (data[index]['permiso'] == 3) {
                    data[index]['permiso'] = 'Mecánico';
                }
                
                let tr = "<tr>"+data[index]['rut'];
                let tdNombre = "<td>"+data[index]['nombre']+' '+data[index]['apellidoPaterno']+' '+data[index]['apellidoMaterno']+"</td>";
                let rut = data[index]['rut'];
                let $boton_modificar = "<btn class='btn btn-warning' data-toggle='modal' data-target='#modificarModal' onclick='modificarModal("+rut+","+permiso+")'>Editar</btn>";
                let tdPermiso = "<td>"+data[index]['permiso']+$boton_modificar+"</td>";
                let tdCargo = "<td>"+data[index]['cargo']+"</td>";
                let $boton_eliminar = "<btn class='btn btn-danger' onclick='eliminarTrabajador("+rut+")'>Eliminar</btn>";
                let tdBtn = "<td>"+$boton_eliminar+"</td>";
                tr = tr + tdNombre + tdPermiso + tdCargo + tdBtn + "</tr>";
            $('table > tbody').append(tr);
            });
    }); 
}



$(function () {
    //cargar tabla
    cargarTabla();

    //boton agregar trabajador
    $('#agregarBtn').click(function (e) {
        e.preventDefault();
        if(validar($('form:input'))==true){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger ml-2'
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
                reverseButtons: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:"../server/controlador/usuarioCont.php",
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
        
                            cargarTabla();
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se ha podido agregar el usuario',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: 'Operación cancelada!',
                        text: 'Se ha cancelado la operación.',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("form :input").prop("value", "");
                    $('#cargotxt').val(0);
                    $('#permisotxt').val(0);
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
                Swal.fire({
                    title: 'Operación cancelada!',
                    text: 'Se ha cancelado la operación.',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("form :input").prop("value", "");
                $('#cargotxt').val(0);
                $('#permisotxt').val(0);
            }
        })
    });
});

function eliminarTrabajador(rutTrabajador) {
    Swal.fire({
        title: '¿Está seguro que desea eliminar este usuario?',
        text: "todos los datos del usuario serán eliminados.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si.',
        cancelButtonText: 'No.'
    }).then((result) => {

        if (result.value) {
            $.ajax({
                url:"../server/controlador/usuarioCont.php",
                type: 'post',
                data:{
                    caso:'eliminar',
                    rut:rutTrabajador
                }
            }).done(function(response){
                Swal.fire({
                    title: 'Trabajador eliminado!',
                    text: 'Se ha eliminado el trabajador.',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1500
                });
                
                cargarTabla();
            })
        }
    })
}


function modificarModal(rutTrabajador,permiso){
    const modalPermiso = document.querySelector("#modalPermiso");
    const modalRut = document.querySelector("#modalRut");
    modalPermiso.value = permiso;
    modalRut.value = rutTrabajador;
}

function editarPermiso(){
    const modalPermiso = document.querySelector("#modalPermiso");
    const modalRut = document.querySelector("#modalRut");
    $.ajax({
        url:"../server/controlador/usuarioCont.php",
        type: 'post',
        data:{
            caso:'modificar',
            rut:modalRut.value,
            permiso: modalPermiso.value
        }
    }).done(function(response){
        Swal.fire({
            title: 'Permiso actualizado!',
            text: 'Se ha actualizado el permiso del trabajador.',
            icon: 'warning',
            showConfirmButton: false,
            timer: 1500
        });
        $("#modificarModal").modal("hide");
        cargarTabla();
    })
}
function validar() {

    return true;

}