<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<script type="text/javascript" src="loginFunciones.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	if (isset($_SESSION["usuario"]) && isset($_SESSION["pass"])) {
		header("projectos.php");
	} else {

		$_POST["usuario"] = "";
		$_POST["password"] = "";

		echo "<div id='header'>";
			echo "¡ Bienvenido !";
		echo "</div>";
		
		echo "<div id='center' >";
			echo "<form action='login.php' method='POST'>";
				echo "<label> Usuario: </label>";
				echo "<input type='text' name='usuario'>";
				echo "<br>";
				echo "<label> Contraseña: </label>";
				echo "<input type='password' name='password'>";
				echo "<br>";
				echo "<input type='submit' name='enviar' value='Aceptar'>";
				echo "<a href='#'> ¿ Olvidaste la contraseña ? </a>";

				$usuario = $_POST["usuario"];
				$password = $_POST["password"];

			echo "</form>";			

		echo "</div>";
		
		echo "<div id='mensajeError'>";

		echo "</div>";
		
		echo "<div id='footer'>";

		echo "</div>";

		echo "<button onclick='error()' > HOLA </button>";

		
	}
	

	?>

</body>
</html>