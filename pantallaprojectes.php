<!DOCTYPE html>
<html>
<head>
	<title>PantallaProjectes</title>
	<script type="text/javascript"  src="funciones.js" ></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="loginFunciones.js"></script>
	<meta charset="utf-8">
<<<<<<< HEAD
=======

>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
</head>
<body>
<?php
	session_start();
<<<<<<< HEAD
	$nombre = $_SESSION["NombreUsuario"];
	$username = $_SESSION["username"];
	
	foreach ($nombre as $value) {
		$nombre=$value;
=======

	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "marc","marc123");


	$nombreUser = $_SESSION["NombreUsuario"];
	$username = $_SESSION["username"];

	foreach ($nombreUser as $value) {
		$nombreUser=$value;
>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
	}

	foreach ($username as $value) {
		$username = $value;
	}

<<<<<<< HEAD
	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "khalid","khalid123");

=======
	
>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
	$consultaRol = $dbh->prepare("SELECT rol FROM usuarios WHERE usuario=:username");

	$consultaRol->bindValue(':username', $username);

	$consultaRol->execute();

	$consultaRolResultado = $consultaRol ->fetch(PDO::FETCH_ASSOC);

	foreach ($consultaRolResultado as $value) {
		$consultaRolResultado = $value;
	}

<<<<<<< HEAD
	if ($consultaRolResultado == "SM") {
		echo "<button onclick='buttonCrearNouProjecte()'> HOLA </button>";
		
	}

	echo "<div id='header'>";
		echo"<nav >";
			echo"<img id='imagenusuario' src='https://img.icons8.com/android/1600/user.png'>";
		  	echo"<b>	usuario : $nombre	</b>";
=======
	$consultaNombreProyecto = $dbh->prepare("SELECT nombre_projecte FROM projectes WHERE  product_owner = :nombre  or scrum_master = :nombre ");
	$consultaNombreProyecto->bindValue(':nombre', $nombreUser);
	$consultaNombreProyecto->execute();
	$nombreProyectos = $consultaNombreProyecto ->fetchAll();

	echo "<div id='header'>";
		echo"<nav>";
			echo"<img id='imagenusuario' src='https://img.icons8.com/android/1600/user.png'>";
		  	echo"<b>	usuario : $nombreUser	</b>";
>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
		  	echo"<a href='login.php'><img id='imagenlogat' src='https://image.flaticon.com/icons/png/512/55/55023.png' ></a> ";
		echo"</nav>"; 
	echo "</div>";

<<<<<<< HEAD
	$nombreproyectos = $_SESSION["NombreProyectos"];

=======
>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
	echo "<div id='center'>";
		echo "<div id='idNombreProyectos'>";
			echo"<p id='idpProjectes'>";
				echo"<b>Projectes</b>";
			echo "</p>";
<<<<<<< HEAD
			foreach ($nombreproyectos as $value) {
=======
			foreach ($nombreProyectos as $value) {
>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
				echo "<p id='idnombreProyec' > <a href='#' > $value[0] </a></p>";
			}
		echo "</div>";
	echo "</div>";

	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
<<<<<<< HEAD
		echo "<button onclick='mensajeError()'> HOLA </button>";
	echo "</div>";
=======
		
	echo "</div>";

>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
	
	
?>
<script type="text/javascript">
<<<<<<< HEAD
	
	var arrayNombreProyectos = '<"php echo $nombreproyectos; ?>'
=======
	var rol = '<?php echo $consultaRolResultado;?>'
	saberRolUsuario();
>>>>>>> 85d793ddaab4e83049e4d83295d1fafb6a8abe47
</script>

</body>
</html>