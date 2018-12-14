<!DOCTYPE html>
<html>
<head>
	<title> Administración del proyecto</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="loginFunciones.js"></script>
	<meta charset="utf-8">
</head>
<body>
	<?php

	//Abro la conexion a la base de datos
	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "admin","admin");

	//Obtengo la url actual de la web para despues obtener el id
	$host= $_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];

	//separo la url por el = para obtener la posicion 1 que es el nombre
	$a = explode("=", $url);

	//Le doy una variable al nombre
	$nombreProyecto = $a[1];

	$consultaDatosProyecto = $dbh->prepare("SELECT * FROM projectes WHERE nombre_projecte=:projectName");

	$consultaDatosProyecto->bindValue(':projectName', $nombreProyecto);

	$consultaDatosProyecto->execute();

	$consultaDatosProyectoResultado = $consultaDatosProyecto ->fetch(PDO::FETCH_ASSOC);

	echo "<div id=marcoInfoProyectos>";
	echo "<p class='titulos'> ID </p>";
	echo "<p class='titulos'> nombre del proyecto </p>";
	echo "<p class='titulos'> Descripción </p>";
	echo "<p class='titulos'> ScrumMaster </p>";
	echo "<p class='titulos'> ProductOwner </p>";
	echo "<p class='titulos'> ID del grupo </p>";

	echo "<br>";
	foreach ($consultaDatosProyectoResultado as $value) {
		$consultaDatosProyectoResultado = $value;
		echo $consultaDatosProyectoResultado;
	}
	echo "</div>";


	?>
</body>
</html>