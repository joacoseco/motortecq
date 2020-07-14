<?php
require "../db.php";

$response = array();
function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}
if (isset($_POST['caso'])){
    switch($_POST['caso']){
        case 'agregar':
            $rut=$_POST['rut'];
            $rut = str_replace(".","",$rut);
            $rut = str_replace("-","",$rut);
            $nombre=$_POST['nombre'];
            $apellidoPaterno=$_POST['apellidoPaterno'];
            $apellidoMaterno=$_POST['apellidoMaterno'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $cargo=$_POST['cargo'];
            $clave= sha1(substr($rut,0,strlen($rut)-1));
            $permiso=$_POST['permiso'];
            $sql="insert into trabajador values('$rut', '$nombre','$apellidoPaterno','$apellidoMaterno', $telefono, '$email', '$cargo','$clave',$permiso)";
            $row = execute($sql);
            if($row==1){
                $response['val']=true;
            }else{
                $response['val']=false;
                if(stripos($row,"duplicate")==false){
                    $response['mensaje']=$row;
                }else{
                    $response['mensaje']="Ese trabajador ya existe";
                }
            }
            break;

        case 'listar':
            $sql="select rut,nombre,apellidoPaterno,apellidoMaterno,cargo,permiso from trabajador";
            $data = query($sql);
            $trabajadores = array();
            if ($data == null) {
                $response['val'] = false;
                $response = $trabajadores;
            }else{
                foreach ($data as $r){
                    $t = array();
                    $t['rut'] = $r['rut'];
                    $t['nombre']=$r['nombre'];
                    $t['apellidoPaterno']= $r['apellidoPaterno'];
                    $t['apellidoMaterno']= $r['apellidoMaterno'];
                    $t['cargo']= $r['cargo'];
                    $t['permiso']= $r['permiso'];
                    $trabajadores[]=$t;
                }
                $response['val'] = true;
                $response = $trabajadores;
            }
            break;

        case 'eliminar':
            $rut=$_POST['rut'];
            $rut = str_replace(".","",$rut);
            $rut = str_replace("-","",$rut);
            $sql = "DELETE FROM trabajador WHERE rut = '$rut';";
            $row = execute($sql);
            $response['val'] = true;
            break;
        
        case 'modificar':
            $rut=$_POST['rut'];
            $rut = str_replace(".","",$rut);
            $rut = str_replace("-","",$rut);
            $permiso = $_POST['permiso'];
            $sql = "UPDATE trabajador SET permiso='$permiso' WHERE rut='$rut';";
            $row = execute($sql);
            $response['val']=true;
            break;
    }
    echo json_encode($response);
}


?>