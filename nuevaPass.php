<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>





<?php 
	session_start();
	$con = mysqli_connect('localhost','admin','1234');
	mysqli_select_db($con, 'projecte_scrumb');
	$email = $_SESSION['email'];
	if (isset($_POST['nuevaContraseña'])) {
		$nuevaPass = $_POST['nuevaContraseña'];
		$sql = "UPDATE 'usuario' SET 'Password'=SHA2('$nuevaContraseña',512) WHERE 'correo'='example@gmail.com'";
		$con->query($sql);
		session_destroy();
?>






 ?>



</body>
</html>