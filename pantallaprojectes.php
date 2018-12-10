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
	$dbh = new PDO( $dbs, "khalid","khalid123");


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

	$consultaNombreProyecto = $dbh->prepare("SELECT nombre_projecte FROM projectes WHERE  product_owner = :nombre  or scrum_master = :nombre ");
	$consultaNombreProyecto->bindValue(':nombre', $nombreUser);
	$consultaNombreProyecto->execute();
	$nombreProyectos = $consultaNombreProyecto ->fetchAll();

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

	$nomusuari = $dbh->prepare("SELECT nombre FROM usuarios WHERE  rol = :rol ");
	$nomusuari->bindValue(':rol', $de);
	$nomusuari->execute();
	$arrayDE = $nomusuari ->fetchAll();
	$array3=[];
	foreach ($arrayDE as $value) {
		array_push($array3, $value[0]);
	}
	

	
	


	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
		
	echo "</div>";

	
	
?>
<script type="text/javascript">
	var arraySM=<?php echo json_encode($array1);?>;
	var arrayPO=<?php echo json_encode($array2);?>;
	var arrayDE=<?php echo json_encode($array3);?>;
	var rol = '<?php echo $consultaRolResultado;?>'
	saberRolUsuario();
</script>

</body>
</html>