<?php
if(isset($_GET['pm2'])){
	$valor= $_GET['valor'];
	$to = "srugeles94@outlook.com";
	$subject = "Alerta Sensor calidad de aire";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	 
	$message = "
	<html>
	<head>
	<title>Alerta</title>
	</head>
	<body>
	<h1>El Sensor pm2.5</h1>
	<p>Emitio una alerta de incremento excesivo el dia ".date('Y-m-d')." a las ".date('H:i:s').", marcando un valor de: ".$valor." </p>
	</body>
	</html>";
	 
	mail($to, $subject, $message, $headers);
}

if(isset($_GET['pm10'])){
	$valor= $_GET['valor'];
	$to = "srugeles94@outlook.com";
	$subject = "Alerta Sensor calidad de aire";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	 
	$message = "
	<html>
	<head>
	<title>Alerta</title>
	</head>
	<body>
	<h1>El Sensor pm10</h1>
	<p>Emitio una alerta de incremento excesivo el dia ".date('Y-m-d')." a las ".date('H:i:s').", marcando un valor de: ".$valor." </p>
	</body>
	</html>";
	 
	mail($to, $subject, $message, $headers);
}