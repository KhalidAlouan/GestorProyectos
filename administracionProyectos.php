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

	//Consulta para sacar los campos del proyecto seleccionado
	$nombreProyecto = $a[1];

	$consultaDatosProyecto = $dbh->prepare("SELECT * FROM projectes WHERE nombre_projecte=:projectName");

	$consultaDatosProyecto->bindValue(':projectName', $nombreProyecto);

	$consultaDatosProyecto->execute();

	$consultaDatosProyectoResultado = $consultaDatosProyecto ->fetch(PDO::FETCH_ASSOC);


	$array_datos = [];
	foreach ($consultaDatosProyectoResultado as $value) {
			$consultaDatosProyectoResultado = $value;
			array_push($array_datos, $consultaDatosProyectoResultado);
	}
	
	//Consulta para sacar el id del projecto
	$consultaId = $dbh->prepare("SELECT id_projecte FROM projectes WHERE nombre_projecte=:projectName");

	$consultaId->bindValue(':projectName', $nombreProyecto);

	$consultaId->execute();

	$consultaIdResultado = $consultaId ->fetch(PDO::FETCH_ASSOC);

	foreach ($consultaIdResultado as $value) {
		$consultaIdResultado = $value;

	}


	

	//Consulta para sacar el numero de especificaciones sin acabar y generar cada marco
	$consultaEspecificacionesSinAcabar = $dbh->prepare("SELECT count( * ) FROM especificaciones WHERE id_projecte = :projectId");

	$consultaEspecificacionesSinAcabar->bindValue(':projectId', $consultaIdResultado);

	$consultaEspecificacionesSinAcabar->execute();

	$consultaEspecificacionesSinAcabarResultado = $consultaEspecificacionesSinAcabar ->fetch(PDO::FETCH_ASSOC);

	foreach ($consultaEspecificacionesSinAcabarResultado as $value) {
		$consultaEspecificacionesSinAcabarResultado = $value;

	}

	echo "<div id='header'>";

	echo "</div>";

	echo "<div id='center'>";

		?>
		<script type="text/javascript">
			var arrayJS = <?php echo json_encode($array_datos);?>;
			inforGeneral(arrayJS);
		</script>
		<?php 

	for ($i=1; $i <=$consultaEspecificacionesSinAcabarResultado ; $i++) { 
		?>
			<script type="text/javascript">
				divEspecificacionesPB(array_especificaciones);
			</script>
		<?php 
	}

	echo "</div>";


	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
		
	echo "</div>";


	?>
	<script type="text/javascript">
		//var array_especificaciones= <?php echo json_encode($consultaEspecificacionesResultado);?>;
		//divEspecificacionesPB(array_especificaciones);
	</script>
</body>
</html>