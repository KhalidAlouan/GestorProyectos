<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
	
	body{
			background-image: url('wallpaper.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}
	</style>
</head>
<body>

	<h2>Correo enviado!</h2>





<?php  

	$con = mysqli_connect('localhost','admin','admin');
	mysqli_select_db($con, 'GestorProjectes');
	$email = $_SESSION['email'];
	$email = $_SESSION['email'];
	$titulo    = 'Cambio de contraseña';
	$mensaje   = 'http://localhost:8080/GestorProjectes/nuevaPass.php';
	$cabeceras = 'From: webmaster@example.com' . "\r\n" .
	'Reply-To: webmaster@example.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($email, $titulo, $mensaje, $cabeceras);
	
?>
</body>
</html>