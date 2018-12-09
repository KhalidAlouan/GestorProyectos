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

	session_destroy();
	session_start();


	$user=$_POST['usuario'];
	$pass=$_POST['passwd'];
	
	
	
	$dbs= "mysql:host=localhost;dbname=GestorProjectes";
	$dbh = new PDO( $dbs, "root","arteagae21");
 	
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

	echo "<p id='p1'></p>";

	?>
	
	<script type="text/javascript">
    var resultUser = '<?php echo $resultUser;?>'
    var resultPass = '<?php echo $resultPass;?>'
    login();
	</script>
	
</body>
</html>