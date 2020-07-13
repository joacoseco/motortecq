<?php
require "../db.php";

$response = array();

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
            $sql="insert into trabajador values('$rut', '$nombre','$apellidoPaterno','$apellidoPaterno', $telefono, '$email', '$cargo','$clave',$permiso)";
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

        case 'listar':
            $sql="select rut,nombre,apellidoPaterno,apellidoMaterno,cargo,permiso from trabajador";
            $data = query($sql);
            $trabajadores = array();
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
            $response = $trabajadores;
    }
    echo json_encode($response);
}


?>