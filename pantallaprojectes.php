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
	$dbh = new PDO( $dbs, "admin","admin");


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
		echo"<nav id='cabezera'>";
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
				echo "<p class='nombreProyec' > <a onclick='hola(id)' id='$value[0]' href='administracionProyectos.php' > $value[0] </a></p>";
			}		
	echo "</div>";

	echo "</div>";

	echo "<div id='mensajeError'>";
	
	echo "</div>";
	
	echo "<div id='footer'>";
		
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
	$nomusuari = $dbh->prepare("SELECT nombre_grupo FROM grupos");
	$nomusuari->bindValue(':rol', $de);
	$nomusuari->execute();
	$arrayDE = $nomusuari ->fetchAll();
	$array3=[];
	foreach ($arrayDE as $value) {
		array_push($array3, $value[0]);
	}



	
	
?>
<script type="text/javascript">
	var arraySM=<?php echo json_encode($array1);?>;
	var arrayPO=<?php echo json_encode($array2);?>;
	var arrayDE=<?php echo json_encode($array3);?>;
	var rol = '<?php echo $consultaRolResultado;?>'
	function hola(id) {
		console.log(id)
	}
	saberRolUsuario();
</script>
</body>
</html>