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
	session_start();

	//Abro la conexion a la base de datos
	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "admin","admin");


	$nombreUser = $_SESSION["NombreUsuario"];
	$username = $_SESSION["username"];

	foreach ($nombreUser as $value) {
		$nombreUser=$value;
	}

	foreach ($username as $value) {
		$username = $value;
	}
	


	echo "<div id='header'>";
		echo"<nav id='cabezera'>";
			echo"<img id='imagenusuario' src='https://img.icons8.com/android/1600/user.png'>";
		  	echo"<b>	usuario : $nombreUser	</b>";
		  	echo"<a href='login.php'><img id='imagenlogat' src='https://image.flaticon.com/icons/png/512/55/55023.png' ></a> ";
		echo"</nav>"; 
	echo "</div>";

	//Consulta para saber el rol de un usuario.
	$consultaRol = $dbh->prepare("SELECT rol FROM usuarios WHERE usuario=:username");

	$consultaRol->bindValue(':username', $username);

	$consultaRol->execute();

	$consultaRolResultado = $consultaRol ->fetch(PDO::FETCH_ASSOC);

	foreach ($consultaRolResultado as $value) {
		$consultaRolResultado = $value;
	}

	//Obtengo la url actual de la web para despues obtener el id
	$host= $_SERVER["HTTP_HOST"];
	$url= $_SERVER["REQUEST_URI"];




	//separo la url por el = para obtener la posicion 1 que es el nombre
	$a = explode("=", $url);

	

	//Consulta para sacar los campos del proyecto seleccionado

	$nombreProyecto = $a[1];

	if (isset($_SESSION["NombreProyecto"])){
		$nombreProyecto=$_SESSION["NombreProyecto"];
	}
	else{
		$_SESSION["NombreProyecto"]=$nombreProyecto;
	}
	


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

	echo "<div id='header'>";

	echo "</div>";

	echo "<div id='center'>";
		
	

	//Consulta para sacar el numero de especificaciones sin acabar y generar cada marco
	$consultaEspecificacionesSinAcabar = $dbh->prepare("SELECT count( * ) FROM especificaciones WHERE id_projecte = :projectId");

	$consultaEspecificacionesSinAcabar->bindValue(':projectId', $consultaIdResultado);

	$consultaEspecificacionesSinAcabar->execute();

	$consultaEspecificacionesSinAcabarResultado = $consultaEspecificacionesSinAcabar ->fetch(PDO::FETCH_ASSOC);

	foreach ($consultaEspecificacionesSinAcabarResultado as $value) {
		$consultaEspecificacionesSinAcabarResultado = $value;

	}

	//Consulta para sacar la info de las especificaciones
    $consultaInfoEspecificaciones = $dbh->prepare("SELECT nombre_especificacion FROM especificaciones WHERE id_projecte = :projectId AND acabado = 0");

    $consultaInfoEspecificaciones->bindValue(':projectId', $consultaIdResultado);
	$consultaInfoEspecificaciones->execute();
	$consultaInfoEspecificacionesResultado = $consultaInfoEspecificaciones->fetchAll(PDO::FETCH_ASSOC);

	$array_especificaciones =[];
	
	foreach($consultaInfoEspecificacionesResultado as $info){
       	array_push($array_especificaciones,$info);
	}

	$sm="SM";
	$nomusuari = $dbh->prepare("SELECT nombre FROM usuarios WHERE  rol = :rol ");
	$nomusuari->bindValue(':rol', $sm);
	$nomusuari->execute();
	$arraySM = $nomusuari ->fetchAll();
	$array1=[];
	foreach ($arraySM as $value) {
		array_push($array1, $value[0]);
		
	}

	$po="PO";
	$nomusuari = $dbh->prepare("SELECT nombre FROM usuarios WHERE  rol = :rol ");
	$nomusuari->bindValue(':rol', $po);
	$nomusuari->execute();
	$arrayPO = $nomusuari ->fetchAll();
	$array2=[];
	foreach ($arrayPO as $value) {
		array_push($array2, $value[0]);
		
	}

	$de="DE";
	$nomusuari = $dbh->prepare("SELECT nombre_grupo FROM grupos");
	$nomusuari->bindValue(':rol', $de);
	$nomusuari->execute();
	$arrayDE = $nomusuari ->fetchAll();
	$array3=[];
	foreach ($arrayDE as $value) {
		array_push($array3, $value[0]);
	}

	

		//Consulta para saber el nombre de los Sprint
	$consultaSprint = $dbh->prepare("SELECT nombre_sprint FROM sprint WHERE id_projecte=:projectId");
	$consultaSprint->bindValue(':projectId', $consultaIdResultado);
	$consultaSprint->execute();
	$nombreSprint = $consultaSprint ->fetchAll();




	echo "<div class='SprintNombres' id='divSprint' >";
			echo"<p id='idpProjectes'>";
				echo"<b>Sprints</b>";
			echo "</p>";	

			

			//Printar Sprints
			foreach ($nombreSprint as $value) {
				echo"<script type='text/javascript'> crearCandados()</script>";
				echo"<button class='accordion' ><p id='$value[0]' class='class0'>$value[0]</p></button>";
				echo"<div class='panel' >";
					$ValorSprint="$value[0]";
					$consultaDatosSprint = $dbh->prepare("SELECT * FROM sprint WHERE  nombre_sprint=:SprintNombre and id_projecte=:projectId ");
					$consultaDatosSprint->bindValue(':SprintNombre', $ValorSprint);
					$consultaDatosSprint->bindValue(':projectId', $consultaIdResultado);
					$consultaDatosSprint->execute();
					$DatosSprint = $consultaDatosSprint ->fetchAll();


								
			  		echo"<p>";
			  			//Datos de un sprint
				  		foreach ($DatosSprint as $value) {
				  			$idsp=$value[0];
							$nombresp=$value[1];
							$idessp=$value[2];
							$idprsp=$value[3];
							$fechainiciosp=$value[4];
							$fechafinalsp=$value[5];

						}
						//Print de los datos de un sprint
						echo "ID SPRINT: $idsp";
						echo "<br>";
						echo"NOMBRE SPRINT: $nombresp";
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
			echo "<br>";
			echo "<br>";
			echo"<button id='CrearSprint' onclick='formularioSprint()'>Crear Nou Sprint</button>";
			echo "<div id='sprintFormulario'></di>";

			//Consulta de Fecha Actual
			$FechaActual = $dbh->prepare("SELECT CURDATE() ");
			$FechaActual->execute();
			$FechaActual = $FechaActual ->fetchAll();
			foreach ($FechaActual as $value1) {
				$FechaActual2=$value1[0];

			}

			//COLORES
			foreach ($nombreSprint as $value) {
				$ValorFechas="$value[0]";
				$consultaFechas = $dbh->prepare("SELECT nombre_sprint,fecha_inicio,fecha_final FROM sprint WHERE  nombre_sprint=:SprintNombre and id_projecte=:projectId");
				$consultaFechas->bindValue(':SprintNombre', $ValorFechas);
				$consultaFechas->bindValue(':projectId', $consultaIdResultado);
				$consultaFechas->execute();
				$Datos = $consultaFechas ->fetchAll();
				foreach ($Datos as $value2) {
					$nombreSprint2=$value2[0];
					$fechainicio=$value2[1];
					$fechafinal=$value2[2];
					//Condicion si un sprint ya ha acabado
					if ($fechainicio<$FechaActual2 && $fechafinal < $FechaActual2){
						echo "<script type='text/javascript'> var NombreIDsprint = '$nombreSprint2' </script>";
						echo"<script type='text/javascript'> estadoAcabado(NombreIDsprint)</script>";
					//Condicion si un sprint esta activo	
					}elseif ($fechainicio < $FechaActual2 && $fechafinal > $FechaActual2) {
						echo "<script type='text/javascript'> var NombreIDsprint = '$nombreSprint2' </script>";
						echo"<script type='text/javascript'> estadoActivo(NombreIDsprint)</script>";
					//Condicion si un sprint esta sin empezar
					}elseif ($fechainicio>$FechaActual2 && $fechafinal > $FechaActual2) {
						echo "<script type='text/javascript'> var NombreIDsprint = '$nombreSprint2' </script>";
						echo"<script type='text/javascript'> estadoSinIniciar(NombreIDsprint)</script>";
					}
					
				}
				
			}
		echo "</div>";
		
	//** Nuevo Sprint 3



	//Consulta para sacar el id del sprint
    $consultaIdSprint = $dbh->prepare("SELECT id_sprint FROM sprint ");
	$consultaIdSprint->execute();
	$consultaIdSprint = $consultaIdSprint->fetchAll();

	$array_IdSprint = [];
	foreach ($consultaIdSprint as $value) {
		array_push($array_IdSprint, $value[0]);
	}

	//Consulta para contar el numero de sprint que hay en el proyecto 
	$cuentaNombresSprint = $dbh->prepare("SELECT count(nombre_sprint) FROM sprint where id_projecte=:id_projecte");
	$cuentaNombresSprint->bindValue(':id_projecte', $consultaIdResultado);
	$cuentaNombresSprint->execute();
	$cuentaNombresSprint = $cuentaNombresSprint->fetchAll();

	$NumeroDeNombres=$cuentaNombresSprint[0][0]+1;

	$NombreNuevoSprint="Sprint".$NumeroDeNombres;

	

	//Almacenar valor de los inputs del formulario Sprint
	$valorIdSprint=$_POST["IdSprintInt"];
	$valorFechaInicio=$_POST["inputDataInici"];
	$valorFechaFinal=$_POST["inputDataFi"];
	$valorHoras=$_POST["inputHoras"];

	print_r($valorIdSprint);
	
	

	$server = "localhost";
 	$user = "admin";
 	$pass = "admin";
 	$bbdd = "GestorProjectes";
 	$connect = mysqli_connect($server,$user, $pass, $bbdd);

 	

	//$connect = mysqli_connect($server,"admin", "admin", "GestorProjectes");
 	$insertSprint = "INSERT INTO sprint (nombre_sprint, id_projecte, fecha_inicio,fecha_final,horas_totales,estado) VALUES ('Sprint5','1','2019-01-15','2019-01-25','4','1');";

	

	if (isset($_POST["InsertarSprint"])){
		
		if($valorFechaInicio>$FechaActual2){
			$valorEstado=1;
			print_r("HOLA");
		}
		else{
			$valorEstado=0;
		}

		echo'<script type="text/javascript">comprobarInsertarSprint();</script>';
    	$inserResultado = $dbh->prepare("INSERT INTO sprint (nombre_sprint, id_projecte, fecha_inicio,fecha_final,horas_totales) VALUES(:id_sprint,:nombre_sprint,:id_projecte,:fecha_inicio,:fecha_final,:horas_totales,:estado)");
    	
    	$inserResultado->bindValue(':nombre_sprint', $NombreNuevoSprint);
    	$inserResultado->bindValue(':id_projecte', $consultaIdResultado);
    	$inserResultado->bindValue(':fecha_inicio', $valorFechaInicio);
    	$inserResultado->bindValue(':fecha_final', $valorFechaFinal);
    	$inserResultado->bindValue(':horas_totales', $valorHoras);
    	$inserResultado->bindValue(':estado', $valorEstado);
    	$inserResultado->execute();
    	header("Location: administracionProyectos.php?id=".$_SESSION["NombreProyecto"]);

		/*
		$insertSprint = "INSERT INTO sprint (nombre_sprint, id_projecte, fecha_inicio,fecha_final,horas_totales,estado) VALUES ('Sprint5','1','2019-01-15','2019-01-25','4','1');";
		header("Location: administracionProyectos.php?id=".$_SESSION["NombreProyecto"]);
		*/
		/*
		if(mysqli_query($connect->query($insertSprint) === TRUE)){
			header("Location: administracionProyectos.php?id=".$_SESSION["NombreProyecto"]);
		}else{
			print_r("Error al insertar el sprint");
		}


    	PDO::query()
    	*/
	}






	echo "</div>";

	
	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
		
	echo "</div>";
	

?>
	<script type="text/javascript">
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

		var arrayJS = <?php echo json_encode($array_datos);?>;
		inforGeneral(arrayJS);
		var array_especificaciones = <?php echo json_encode($array_especificaciones);?>;
		divEspecificacionesPB(array_especificaciones);

		//**Nuevo Sprint 3
		var arrayIdSprint = <?php echo json_encode($array_IdSprint);?>;
		

	</script>
</body>
</html>