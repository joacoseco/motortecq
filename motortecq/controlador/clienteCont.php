<?php

include "../../server/db.php";
$response = array();
if (isset($_POST['caso'])){
    
    switch($_POST['caso']){
        case 'agregar':

        case 'reservar':

            
    }
    

    echo json_encode($response);
}


?>