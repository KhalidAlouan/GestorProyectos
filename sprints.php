<!DOCTYPE html>
<html>
<head>
	<title>Sprint</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="loginFunciones.js"></script>
	<meta charset="utf-8">
</head>
<body>
<?php

	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "admin","admin");


	$consultaSprint = $dbh->prepare("SELECT nombre_sprint FROM sprint ");
		$consultaSprint->execute();
		$nombreSprint = $consultaSprint ->fetchAll();


	


	echo "<div id='header'>";
		echo"<nav>";
			echo"<img id='imagenusuario' src='https://img.icons8.com/android/1600/user.png'>";
		  	echo"<b>	usuario : $nombreUser	</b>";
		  	echo"<a href='login.php'><img id='imagenlogat' src='https://image.flaticon.com/icons/png/512/55/55023.png' ></a> ";
		echo"</nav>"; 
	echo "</div>";

	echo "<div id='center'>";
		echo "<div class='SprintNombres'>";
			echo"<p id='idpProjectes'>";
				echo"<b>Sprints</b>";
			echo "</p>";

			//COLORES
			$ValorFechas="$value[0]";
					$consultaFechas = $dbh->prepare("SELECT nombre_sprint,fecha_inicio,fecha_final FROM sprint WHERE  nombre_sprint=:SprintNombre ");
					$consultaFechas->bindValue(':SprintNombre', $ValorSprint);
					$consultaFechas->execute();
					$Datos = $consultaFechas ->fetchAll();
					foreach ($Datos as $value2) {
						$nombreSprint2=$value2[0];
						$fechainicio=$value2[1];
						$fechafinal=$value2[2];
					}

					$FechaActual = $dbh->prepare("SELECT CURDATE() ");
					$FechaActual->execute();
					$FechaActual = $FechaActual ->fetchAll();
					foreach ($FechaActual as $value1) {
						$FechaActual2=$value1[0];
					}

			//Printar Sprints
			foreach ($nombreSprint as $value) {

				echo"<button class='accordion' id='$value[0]'>$value[0]</button>";
				echo"<div class='panel' >";
					$ValorSprint="$value[0]";
					$consultaDatosSprint = $dbh->prepare("SELECT * FROM sprint WHERE  nombre_sprint=:SprintNombre ");
					$consultaDatosSprint->bindValue(':SprintNombre', $ValorSprint);
					$consultaDatosSprint->execute();
					$DatosSprint = $consultaDatosSprint ->fetchAll();

								
			  		echo"<p>";
				  		foreach ($DatosSprint as $value) {
				  			$idsp=$value[0];
							$nombresp=$value[1];
							$idessp=$value[2];
							$idprsp=$value[3];
							$fechainiciosp=$value[4];
							$fechafinalsp=$value[5];

						}
						echo "ID SPRINT: $idsp";
						echo "<br>";
						echo"NOMBRE PROJECTE: $nombresp";
						echo "<br>";
						echo "ID ESPECIFICACION: $idessp";
						echo "<br>";
						echo "ID PROJECTE: $idprsp";
						echo "<br>";
						echo "FECHA INICIO: $fechainiciosp";
						echo "<br>";
						echo "FECHA FINAL: $fechafinalsp";
				  	echo"</p>";
				
				echo"</div>";
			}
		echo "</div>";
	echo "</div>";

	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
		
	echo "</div>";



  ?>
  <script>
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var panel = this.nextElementSibling;
	    if (panel.style.display === "block") {
	      panel.style.display = "none";
	    } else {
	      panel.style.display = "block";
	    }
	  });
	}
</script>
</body>
</html>