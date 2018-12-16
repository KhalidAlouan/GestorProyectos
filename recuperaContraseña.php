<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<style type="text/css">
		body{
			background-image: url('wallpaper.jpg');
			background-size: cover;
			background-repeat: no-repeat;
		}

		h2{
			color: #8cc7a6;
		}
	</style>
</head>
<body>

	<h2 style="text-align: center">Introduce un correo para cambiar la contraseña</h2>
	<div class="row">
			<div class="col s12 m4 offset-m4">
				<div class="card">

					<form action="enviarMail.php" method="post">
						<div class="form-field">
							<input placeholder="Introduce aqui tu correo" type="email" name="email">
							<label for="email">E-mail</label>
						</div>
						<input type="submit" name="submit" value="Envia" class="btn btn-large waves-effect waves-dark">
					</form>
				</div>
			</div>
	</div>
	<a style="text-align: center" href="login.php">Volver a Inicio</a>
</body>



<?php  
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
        session_start();
        $_SESSION['email'] = $email;
        $con = mysqli_connect('localhost','admin','admin');
        mysqli_select_db($con, 'GestorProjectes');
        $consulta="select * from usuarios WHERE correo = '$email'";

        $resultado = mysqli_query($con, $consulta);
		$num_row = mysqli_num_rows($resultado);
        if($num_row > 0) {
        	header ('Location: enviarCorreo.php');
        }
        else{
        	echo "<font size=10 style='color:red';>El correo introducido no existe</font>";
        }
    }






?>
</html>