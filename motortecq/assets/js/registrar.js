$(document).ready(function(){
    document.querySelector('#registerForm').style.display = 'none';

    $("body").on("click","#boton_seleccionar", ()=>{
        let tipos = document.getElementById("tipoUsuario").value;

        if (tipos == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccione un tipo de usuario',
                showConfirmButton: false,
                timer: 1500
            })
            
        }else{
            if (tipos == "empresa") {
                document.querySelector('#apellidoPaterno').style.display = 'none';
                document.querySelector('#apellidoMaterno').style.display = 'none';
                document.querySelector('.apellidoPaterno').style.display = 'none';
                document.querySelector('.apellidoMaterno').style.display = 'none';
    
                document.querySelector('#registerForm').style.display = 'block';
            }else{
                if (tipos == "natural") {
                    document.querySelector('#apellidoPaterno').style.display = 'block';
                    document.querySelector('#apellidoMaterno').style.display = 'block';
                    document.querySelector('.apellidoPaterno').style.display = 'block';
                    document.querySelector('.apellidoMaterno').style.display = 'block';
                    document.querySelector('#registerForm').style.display = 'block';
                }
            }
        }
    });

    $("body").on("click","#boton_registrar", ()=>{
        let rut = document.getElementById('rut').value;
        let nombre = document.getElementById('nombre').value;
        let apellidoPaterno = document.getElementById('apellidoPaterno').value;
        let apellidoMaterno = document.getElementById('apellidoMaterno').value;
        let prefijo = "+569";
        let telefono = prefijo + toString(document.getElementById("telefono").value);
        let email = document.getElementById("correo").value;
        let tipo = document.getElementById("tipoUsuario").value;

        $.ajax({
            url: '../server/controlador/clienteCont.php',
            type:'post',
            data:{
                caso:'agregar',
                rut: rut,
                nombre: nombre,
                apellidoPaterno: apellidoPaterno,
                apellidoMaterno: apellidoMaterno,
                telefono: telefono,
                email: email,
                tipo : tipo
            }
        }).done((response) =>{
            let data = JSON.parse(response);
            if (data['val'] == true) {
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Registrado',
                    text: 'Se ha registrado exitosamente!',
                    footer: 'Ahora podrá iniciar sesión con su correo y contraseña',
                    showConfirmButton: true,
                    confirmButtonText: 'Aceptar'
                }).then((result) =>{
                    if (result.value) {
                        location.href='index.php';
                    }
                });
            }
        })
    });
});
