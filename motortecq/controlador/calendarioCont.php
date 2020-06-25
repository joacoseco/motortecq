<?php

include "../../server/db.php";
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

        case 'reservar':

            
    }
    

    echo json_encode($response);
}


?>