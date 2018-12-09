<!DOCTYPE html>
<html>
<head>
	<link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<title>LOGIN</title>
	
	<script type="text/javascript" src="loginFunciones.js" ></script>

	<link rel="stylesheet" type="text/css" href="style.css">

	<meta charset="utf-8">
</head>
<body>
	<div id='header'>
		
	</div>
	<div id='center' >
		<div id="contenido">
			<section class="section section-login">
		            <div class="valign-wrapper row login-box">
		                    <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
		                      <form action="#" method="POST">
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
		                            <input type="submit" class="btn teal waves-effect waves-light" value="Login">
		                        </div>
		                      </form>
		                    </div>
		            </div>
			</section>
		</div>
	</div>

	<div id='mensajeError'>
	
	</div>
	
	<div id='footer'>
		<button onclick='mensajeError("holaholaholaholaholaholaholaholaholaholaholaholaholaholaholaholaholaholaholahola")' > HOLA </button>
	</div>

	<?php

		session_destroy();
		session_start();
		$user=$_POST['usuario'];
		$pass=$_POST['passwd'];
		
		
		$dbs= "mysql:host=localhost;dbname=GestorProjectes";
		$dbh = new PDO( $dbs, "marc","marc123");
	 	
		$consultaUsuario = $dbh->prepare("SELECT * FROM usuarios WHERE usuario=:user");
		$consultaPassword = $dbh->prepare("SELECT * FROM usuarios WHERE password=SHA2(:pass,512) ");
	    $consultaUsuario->bindValue(':user', $user);
		$consultaPassword->bindValue(':pass', $pass);
		$consultaUsuario->execute();
		$consultaPassword->execute();
	 	
		$resultUser=$consultaUsuario->rowCount();
		$resultPass=$consultaPassword->rowCount();
		
		if($user==""){
			$resultUser=5;
			$resultPass=5;	
		}
		
		$consultaNombreUsuario = $dbh->prepare("SELECT nombre FROM usuarios WHERE usuario=:user");
		$consultaNombreUsuario->bindValue(':user', $user);
		$consultaNombreUsuario->execute();
		$nombreUser = $consultaNombreUsuario ->fetch(PDO::FETCH_ASSOC);
		$_SESSION["NombreUsuario"] = $nombreUser ;
		$consultaProyectos =  $dbh->prepare("SELECT nombre_projecte FROM projectes");
		$consultaProyectos->execute();
		$nombreProyectos = $consultaProyectos ->fetchAll();
		$_SESSION["NombreProyectos"] = $nombreProyectos ;


		/*Hago una consulta para sacar el nombre de usuario*/
		$consultaUsername = $dbh->prepare("SELECT usuario FROM usuarios WHERE usuario=:user");
		$consultaUsername->bindValue(':user', $user);
		$consultaUsername->execute();
		$username = $consultaUsername ->fetch(PDO::FETCH_ASSOC);
		$_SESSION["username"] = $username ;


		echo "<p id='p1'></p>";
		?>
		
		<script type="text/javascript">
		    var resultUser = '<?php echo $resultUser;?>'
		    var resultPass = '<?php echo $resultPass;?>'
		    login();
		</script>	
</body>
</html>