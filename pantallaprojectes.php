<!DOCTYPE html>
<html>
<head>
	<title>PantallaProjectes</title>
	<script type="text/javascript"  src="funciones.js" ></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="loginFunciones.js"></script>
	<meta charset="utf-8">
</head>
<body>
<?php
	session_start();
	$nombre = $_SESSION["NombreUsuario"];
	$username = $_SESSION["username"];
	
	foreach ($nombre as $value) {
		$nombre=$value;
	}

	foreach ($username as $value) {
		$username = $value;
	}

	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "khalid","khalid123");

	$consultaRol = $dbh->prepare("SELECT rol FROM usuarios WHERE usuario=:username");

	$consultaRol->bindValue(':username', $username);

	$consultaRol->execute();

	$consultaRolResultado = $consultaRol ->fetch(PDO::FETCH_ASSOC);

	foreach ($consultaRolResultado as $value) {
		$consultaRolResultado = $value;
	}

	if ($consultaRolResultado == "SM") {
		echo "<button onclick='buttonCrearNouProjecte()'> HOLA </button>";
		
	}

	echo "<div id='header'>";
		echo"<nav >";
			echo"<img id='imagenusuario' src='https://img.icons8.com/android/1600/user.png'>";
		  	echo"<b>	usuario : $nombre	</b>";
		  	echo"<a href='login.php'><img id='imagenlogat' src='https://image.flaticon.com/icons/png/512/55/55023.png' ></a> ";
		echo"</nav>"; 
	echo "</div>";

	$nombreproyectos = $_SESSION["NombreProyectos"];

	echo "<div id='center'>";
		echo "<div id='idNombreProyectos'>";
			echo"<p id='idpProjectes'>";
				echo"<b>Projectes</b>";
			echo "</p>";
			foreach ($nombreproyectos as $value) {
				echo "<p id='idnombreProyec' > <a href='#' > $value[0] </a></p>";
			}
		echo "</div>";
	echo "</div>";

	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
		echo "<button onclick='mensajeError()'> HOLA </button>";
	echo "</div>";
	
	
?>
<script type="text/javascript">
	
	var arrayNombreProyectos = '<"php echo $nombreproyectos; ?>'
</script>

</body>
</html>