<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<script type="text/javascript"  src="funciones.js" ></script>
</head>
<body>
	<?php

	echo "<h1>LOGIN  </h1>";

	echo "<form action='login.php' method='post' >";
	echo" USUARIO: <input type='text' name='usuario'><br>";
	echo"CONTRASEÑA: <input type='password' name='passwd'><br>";
	echo "<input value='ENTRAR' type='submit' name='Submit'>";
	echo"</form>";


	$user=$_POST['usuario'];
	$pass=$_POST['passwd'];



	$BaseDeDatos= "mysql:host=localhost;dbname=GestorProjectes";
	$Login = new PDO( $dbs, "miguel","miguel123");
 
	$USER = $Login->prepare("SELECT * FROM usuarios WHERE usuario=:user AND password=SHA2(:pass,512) ");

    $stmt->bindValue(':user', $user);
	$stmt->bindValue(':pass', $pass);
	$stmt->execute();
 	

	$result=$stmt->rowCount();
	
	if($result==1){
		echo "Hola $user";
	}

 	


	?>

</body>
</html>