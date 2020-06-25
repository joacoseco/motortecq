<?php

function conexion(){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=motortecq;
        charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        $output = 'Unable to connect to the database server: ' . $e;
        return $output;
    }
}


function execute($sql)
{
    try {
        $pdo = conexion();
        $affectedRows = $pdo->exec($sql);
        return $affectedRows;
    }catch (PDOException $e){
        return $e->getMessage();
    }
}

function query($sql)
{
    $pdo = conexion();
    $resul = $pdo->query($sql);
    while ($row = $resul->fetch()) {
        $res[] = $row;
    }
    return $res;
}


