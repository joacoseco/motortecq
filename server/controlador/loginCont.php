<?php
require "../db.php";
require "../Trabajador.php";
require "../Cliente.php";

$response = array();

if(isset($_POST)){
    $rut = $_POST['rut'];
    $clave = $_POST['clave'];

    $rut = str_replace(".","",$rut);
    $rut = str_replace("-","",$rut);
    $clave= sha1($clave);

    $sql = "select * from trabajador where clave ='$clave' and rut = '$rut'";
    $data = query($sql);
    $usuario;
    if ($data == null) {
        $sql = "select * from cliente where clave ='$clave' and rut = '$rut'";
        $data = query($sql);
        if($data==null){
            $response['val'] = false;
        }else{
            foreach ($data as $r){
                $t = new cliente();
                $t->setRut($r['rut']);
                $t->setNombre($r['nombre']);
                $t->setApellidoPaterno($r['apellidoPaterno']);
                $t->setApellidoMaterno($r['apellidoMaterno']);
                $t->setPermiso($r['permiso']);
                $usuario =$t;
            }
            $response['val'] = true; 
        }
    }else{
        foreach ($data as $r){
            $t = new trabajador();
            $t->setRut($r['rut']);
            $t->setNombre($r['nombre']);
            $t->setApellidoPaterno($r['apellidoPaterno']);
            $t->setApellidoMaterno($r['apellidoMaterno']);
            $t->setPermiso($r['permiso']);
            $usuario =$t;
        }
        $response['val'] = true; 
    }
    if($response['val'] == true){
        session_start();
        $_SESSION['usuario']=$usuario;
    }
    echo json_encode($response);
}
?>