<?php
date_default_timezone_set('America/Santiago');
// Unix
setlocale(LC_TIME, 'es_CL.UTF-8');
// En windows
setlocale(LC_TIME, 'spanish');

include "../db.php";
$response = array();
if(isset($_GET['view'])){
    $res = query("select * from disponibilidad");
    foreach($res as $r){
        $p['id']=$r['id'];
        $p['title']=$r['title'];
        $p['start']=$r['start'];
        $p['end']=$r['end'];
        $p['color']=$r['color'];
        $response[]=$p;
    }
    echo json_encode($response);
}elseif (isset($_POST['caso'])){
    
    switch($_POST['caso']){
        case 'agregar': 
            //$repetir = $_POST['repetir'];
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $color = $_POST['color'];
            $response = agregarDisp($title,$start,$end,$color);
        break;     
            
        case 'disp1':   //cuando se regitran cada hora manualmente

        case 'disp2': // cuando registra las horas automaticamente
            //$repetir = $_POST['repetir'];
            $title = $_POST['title'];
            $startAl = $_POST['startAl'];
            $endAl = $_POST['endAl'];
            $duracion =$_POST['duracion'];
            $cantidadDiaria =$_POST['cantidadDiaria'];
            $color = $_POST['color'];
            $dia = $_POST["dia"];

            $diaArray = explode('-',$dia);
            $startAlArray = explode(":",$startAl);
            $endAlArray = explode(":",$endAl);

            $dia = date("Y-m-d H:i",mktime(9,0,0,$diaArray[1],$diaArray[2],$diaArray[0]));
            
            $startAl = date("Y-m-d H:i",mktime($startAlArray[0],$startAlArray[1],0,$diaArray[1],$diaArray[2],$diaArray[0])); 
            $endAl = date("Y-m-d H:i",mktime($endAlArray[0],$endAlArray[1],0,$diaArray[1],$diaArray[2],$diaArray[0]));
            
            
            
            for($i=1; $i<=$cantidadDiaria; $i++){ 
                if($i!=1){
                    $start =$end;
                }else{
                    $start = $dia;
                }
                $hora = substr($start,strpos($start,":")-2,2);
                $min = substr($start,strpos($start,":")+1,2);
                $min = $min + $duracion;
                $end = date("Y-m-d H:i",mktime($hora,$min,0,$diaArray[1],$diaArray[2],$diaArray[0]));
                if($startAl!=$start && $endAl != $end){
                    $response = agregarDisp($title,$start,$end,$color);
                }else{
                    $response = agregarDisp('En Colacion',$start,$end,'#6c757d');
                }
               
            }
        break;
        case 'reservar':

            
    }
    

    echo json_encode($response);
}

function agregarDisp($title,$start,$end,$color){
    $sql = "insert into disponibilidad (title,start,end,color) values ('$title','$start','$end','$color')";
    $row = execute($sql);
    if($row==1){
        $response['val']=true;
    }else{
        $response['val']=false;
        $response['error'] = $row;
    }
    return $response;
}

?>