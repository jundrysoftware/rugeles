<?php
//require_once('conection/conection.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
require_once('conexion.php');
date_default_timezone_set('America/Bogota');

if(isset($_GET['temperature'])){
    $temp = $_GET['temperature'];
    $hum = $_GET['humidity'];
    $id = $_GET['idsensor'];
    mysqli_query($con,"INSERT INTO `am2302`(`temperatura`, `humedad`, `date_reg`, `sensor_id`) VALUES ('$temp','$hum',NOW(),'$id')");
}


if(isset($_GET['getinfohumedad'])){
    $id = $_GET['idsensor'];
    $sql = mysqli_query($con,"SELECT humedad FROM am2302 WHERE sensor_id=$id and humedad > 0 LIMIT 1000");
    $array = [];
    $count=0;
    while($row=mysqli_fetch_assoc($sql)){
        $count++;
        $temp = [
            "x" => $count,
            "y" => intval($row['humedad'])
        ];
        array_push($array,$temp);
    }
    echo json_encode($array);
}

if(isset($_GET['getinfotemperatura'])){
    $id = $_GET['idsensor'];
    $sql = mysqli_query($con,"SELECT temperatura FROM am2302 WHERE sensor_id=$id and temperatura LIMIT 1000");
    $array = [];
    $count=0;
    while($row=mysqli_fetch_assoc($sql)){
        $count++;
        $temp = [
            "x" => $count,
            "y" => intval($row['temperatura'])
        ];
        array_push($array,$temp);
    }
    echo json_encode($array);
}

