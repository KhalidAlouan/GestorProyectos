<!DOCTYPE html>
<html>
<head>
	<title>Restablecer Contraseña</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	$userID=$_GET["userID"];
	echo"<div class='divCorreo>";
	echo $userID;
	echo "<form method='post' >";
	echo "Introduce la nueva contraseña:<br>";
	echo "<input type='password' name='pass1'><br>";
	echo "Vuelve a introducir la nueva contraseña:<br>";
	echo "<input type='password' name='pass2'><br>";
	echo "<input type='submit' name='btsubmit' value='enviar'>";
	echo "</form>";
	echo"</div>";
	$conn = mysqli_connect('localhost','admin','admin');
	mysqli_select_db($conn, 'GestorProjectes');
	if (isset($_POST["btsubmit"])) {
		if ($_POST["pass1"]==$_POST["pass2"]) {
			$pass=$_POST["pass1"];
			$conn = mysqli_connect('localhost','admin','admin');
			mysqli_select_db($conn, 'GestorProjectes');
			$update=("UPDATE usuarios SET password = SHA2('$pass',256) WHERE id='$userID';");
			$resultatem = mysqli_query($conn, $update);
		}
	}


?>

</body>
</html>