<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
	echo "<div class='divCorreo'>";
	echo "<form action='formcorreo.php' method='POST' >";
	echo "<p>Introduce tu correo electronico: </p>";
	echo "<input type='text' name='correoE'><br><br>";
	echo "<input type='submit'value='Enviar' name='send'>";
	echo "</form>";
	echo"</div>";

	$MensajeError=0;
	$conn = mysqli_connect('localhost','admin','admin');
	mysqli_select_db($conn, 'GestorProjectes');
	$consulta = ("SELECT * FROM usuarios;");
	$resultat = mysqli_query($conn, $consulta);
	$arrayCorreo=[];
	while( $correos = mysqli_fetch_assoc($resultat)){
		//print_r($emails["email"]);
		array_push($arrayCorreo,$correos["correo"] );
	}
	$CorreoUser = $_POST["correoE"];
	if(isset($_POST["send"])){
		foreach ($arrayCorreo as $value) {
			if ($value==$_POST["correoE"]) {
				enviarCorreo($CorreoUser);
				
			}else{
				$MensajeError=1;
			}
	}
	}
	if ($MensajeError==1) {
		echo "no valido";
	}
	
	function enviarCorreo($CorreoUsuario){
		$conn2 = mysqli_connect('localhost','admin','admin');
		mysqli_select_db($conn2, 'GestorProjectes');
		$consultaem = ("SELECT id FROM usuarios WHERE correo = '$CorreoUsuario';");
		$resultatem = mysqli_query($conn2, $consultaem);
		while( $ema = mysqli_fetch_assoc($resultatem)){
			$idNumber=$ema["id"];
		};
		$correo = $CorreoUsuario;
		$Asunto = "Recuperacion de contraseña";
		$Contenido = "http://www.miguelarteaga.tk/restablecerpss.php?userID=".$idNumber;
		mail($correo, $Asunto,$Contenido);
		header("Location:login.php");
			
	}




 ?>

</body>
</html>