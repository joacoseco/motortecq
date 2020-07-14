<?php

include "../db.php";
$response = array();
if (isset($_POST['caso'])){
    
    switch($_POST['caso']){
        case 'agregar':
            $rut = $_POST['rut'];
            $rut = str_replace(".","",$rut);
            $rut = str_replace("-","",$rut);
            $nombre = $_POST['nombre'];
            $apellidoPaterno = $_POST['apellidoPaterno'];
            $apellidoMaterno = $_POST['apellidoMaterno'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $tipo = $_POST['tipo'];
            $clave = sha1(substr($rut,0,strlen($rut)-1));

            if ($apellidoPaterno == "" && $apellidoMaterno == "") {
                $sql = "INSERT INTO cliente (rut,nombre,apellidoPaterno,apellidoMaterno,telefono,email,tipoCliente,clave,permiso)
                        VALUES ('$rut', '$nombre', DEFAULT, DEFAULT, '$telefono', '$email', 
                            '$tipo', '$clave', DEFAULT);";
            }else{
                $sql = "INSERT INTO cliente (rut,nombre,apellidoPaterno,apellidoMaterno,telefono,email,tipoCliente,clave,permiso)"
                       ." VALUES ('$rut', '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$telefono', '$email', "
                        ."'$tipo', '$clave', DEFAULT);";
            }

            $row = execute($sql);
            if ($row == 1) {
                $response['val'] = true;
            }else{
                $response['val'] = false;
                if (stripos($row,"duplicate")==false) {
                    $response['mensaje'] =$row;
                }else{
                    $response['mensaje'] = "Este usuario ya está registrado";
                }
            }
        case 'reservar':

            
    }
    

    echo json_encode($response);
}


?>