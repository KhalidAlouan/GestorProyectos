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

	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "miguel","miguel123");


	$nombreUser = $_SESSION["NombreUsuario"];
	$username = $_SESSION["username"];

	foreach ($nombreUser as $value) {
		$nombreUser=$value;
	}

	foreach ($username as $value) {
		$username = $value;
	}

	
	$consultaRol = $dbh->prepare("SELECT rol FROM usuarios WHERE usuario=:username");

	$consultaRol->bindValue(':username', $username);

	$consultaRol->execute();

	$consultaRolResultado = $consultaRol ->fetch(PDO::FETCH_ASSOC);

	foreach ($consultaRolResultado as $value) {
		$consultaRolResultado = $value;
	}


	$consultaIdGrupo = $dbh->prepare("SELECT grupo FROM usuarios WHERE  usuario = :user");
	$consultaIdGrupo->bindValue(':user', $username);
	$consultaIdGrupo->execute();
	$idgrupo = $consultaIdGrupo ->fetch(PDO::FETCH_ASSOC);

	foreach ($idgrupo as $value) {
		$idgrupo = $value;
	}

	print_r($idgrupo);


	if($consultaRolResultado != "SM"){
		$consultaNombreProyecto = $dbh->prepare("SELECT nombre_projecte FROM projectes WHERE  product_owner = :nombre  or id_grupo = :grupoid ");
		$consultaNombreProyecto->bindValue(':nombre', $nombreUser);
		$consultaNombreProyecto->bindValue(':grupoid', $idgrupo);
		$consultaNombreProyecto->execute();
		$nombreProyectos = $consultaNombreProyecto ->fetchAll();
	}
	else{
		$consultaNombreProyecto = $dbh->prepare("SELECT nombre_projecte FROM projectes");
		$consultaNombreProyecto->execute();
		$nombreProyectos = $consultaNombreProyecto ->fetchAll();
	}

	echo "<div id='header'>";
		echo"<nav>";
			echo"<img id='imagenusuario' src='https://img.icons8.com/android/1600/user.png'>";
		  	echo"<b>	usuario : $nombreUser	</b>";
		  	echo"<a href='login.php'><img id='imagenlogat' src='https://image.flaticon.com/icons/png/512/55/55023.png' ></a> ";
		echo"</nav>"; 
	echo "</div>";

	echo "<div id='center'>";
		echo "<div id='idNombreProyectos'>";
			echo"<p id='idpProjectes'>";
				echo"<b>Projectes</b>";
			echo "</p>";
			foreach ($nombreProyectos as $value) {
				echo "<p id='idnombreProyec' > <a href='#' > $value[0] </a></p>";
			}
		echo "</div>";
	echo "</div>";

	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
		
	echo "</div>";

	
	
?>
<script type="text/javascript">
	var rol = '<?php echo $consultaRolResultado;?>'
	saberRolUsuario();
</script>

</body>
</html>