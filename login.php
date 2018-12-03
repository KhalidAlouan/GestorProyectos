<!DOCTYPE html>
<html>
<head>
	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>LOGIN</title>
	<script type="text/javascript"  src="funciones.js" ></script>
</head>
<body>
	<section class="section section-login">
	            <div class="valign-wrapper row login-box">
	                    <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
	                      <form action="" method="POST">
	                        <div class="card-content">
	                          <span class="card-title">Login</span>
	                          <div class="row">
	                          	
	                            <div class="input-field col s12">
	                              <label for="text">usuario </label>
	                              <br>
	                              <input type="text" class="validate" name="usuario"  />
	                            </div>
	                            <div class="input-field col s12">
	                              <label for="password">contraseña </label>
	                              <br>
	                              <input type="password" class="validate" name="passwd"  />
	                            </div>
	                          </div>
	                        </div>
	                        <div class="card-action right-align">
	                          <!--<input type="reset" id="reset" class="btn-flat grey-text waves-effect">-->
	                          <input type="submit" class="btn teal waves-effect waves-light" value="Login">
	                        </div>
	                      </form>
	                    </div>
	            </div>
	</section>


	<?php

	$user=$_POST['usuario'];
	$pass=$_POST['passwd'];


	$resultUser=2;
	$resultPass=2;
	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "miguel","miguel123");
 
	$consultaUsuario = $dbh->prepare("SELECT * FROM usuarios WHERE usuario=:user");

	$consultaPassword = $dbh->prepare("SELECT * FROM usuarios WHERE password=SHA2(:pass,512) ");

    $consultaUsuario->bindValue(':user', $user);
	$consultaPassword->bindValue(':pass', $pass);
	$consultaUsuario->execute();
	$consultaPassword->execute();
 	

	$resultUser=$consultaUsuario->rowCount();
	$resultPass=$consultaPassword->rowCount();
	

	if($resultUser==1 and $resultPass==1){
		echo"loginCorrecto()";
	}
	elseif($resultUser==1 and $resultPass!=1){
		echo"errorPassword()";
	}
	elseif ($resultUser!=1 and $resultPass==1) {
		echo"errorUser()";
	}
	elseif($resultUser!=1 and $resultPass!=1){
		echo"errorLogin()";
	}
	echo "<p id='p1'>nada</p>";

 	echo"<div>";
 	echo "</div>";

	echo"<div>";
 	echo "</div>";

	?>
	<script type="text/javascript" language="javascript"></script>
	
</body>
</html>