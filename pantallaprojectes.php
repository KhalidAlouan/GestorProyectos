<!DOCTYPE html>
<html>
<head>
	<title>PantallaProjectes</title>
	<script type="text/javascript"  src="funciones.js" ></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php 
	session_start();
	
	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "miguel","miguel123");

	$nombreUser=$_SESSION["NombreUsuario"];

	foreach ($nombreUser as $value) {
		$nombreUser=(string)$value;
	}


	$nombre = $_SESSION["NombreUsuario"];
	foreach ($nombre as $value) {
		$nombre=$value;
	}
	
	

	 echo"<nav >";
	 	echo"<img id='imagenusuario' src='https://img.icons8.com/android/1600/user.png'>";
	  	echo"<b>	usuario : $nombre	</b>";
	  	echo"<a href='login.php'><img id='imagenlogat' src='https://image.flaticon.com/icons/png/512/55/55023.png' ></a> ";
	echo"</nav>"; 


	$consultaNombreProyecto = $dbh->prepare("SELECT nombre_projecte FROM projectes WHERE  product_owner = :nombre  or scrum_master = :nombre ");
	$consultaNombreProyecto->bindValue(':nombre', $nombreUser);
	$consultaNombreProyecto->execute();
	$nombreProyectos = $consultaNombreProyecto ->fetchAll();
	
	echo "<div id='idNombreProyectos'>";
		echo"<p id='idpProjectes'>";
			echo"<b>Projectes</b>";
		echo "</p>";
		foreach ($nombreProyectos as $value) {
			echo "<p id='idnombreProyec' > <a href='#' > $value[0] </a></p>";
		}
	echo "</div>";

	
	

?>
<script type="text/javascript">
	creacionNombreProyectos();
	var arrayNombreProyectos = '<"php echo $nombreproyectos; ?>'
</script>

</body>
</html>