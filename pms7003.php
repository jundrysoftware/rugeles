<?php
//require_once('conection/conection.php');
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Origin: *");
require_once('conexion.php');
date_default_timezone_set('America/Bogota');

if(isset($_GET['pm10'])){
    $pm2 = $_GET['pm2'];
    $pm10 = $_GET['pm10'];
    $id = $_GET['idsensor'];
    mysqli_query($con,"INSERT INTO `pms7003`(`pm2`, `pm10`, `date_reg`, `sensor_id`) VALUES ('$pm2','$pm10',NOW(),'$id')");
}

if(isset($_GET['getinfopm2'])){
    $id = $_GET['idsensor'];
    $sql = mysqli_query($con,"SELECT * FROM pms7003 WHERE sensor_id=$id and pm2 > 0 LIMIT 1000");
    $array = [];
    $count=0;
    while($row=mysqli_fetch_assoc($sql)){
        $count++;
        $temp = [
            "x" => $count,
            "y" => intval($row['pm2'])
        ];
        array_push($array,$temp);
    }
    echo json_encode($array);
}

if(isset($_GET['getinfopm10'])){
    $id = $_GET['idsensor'];
    $sql = mysqli_query($con,"SELECT * FROM pms7003 WHERE sensor_id=$id and pm10 > 0 LIMIT 1000");
    $array = [];
    $count=0;
    while($row=mysqli_fetch_assoc($sql)){
        $count++;
        $temp = [
            "x" => $count,
            "y" => intval($row['pm10'])
        ];
        array_push($array,$temp);
    }
    echo json_encode($array);
}