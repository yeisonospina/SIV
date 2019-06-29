<?php 

if (isset($_SESSION['estado'])) {
	session_unset();
session_destroy();
}






?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="estilos.css?uuid=<?php echo uniqid();?>">
	<link rel="stylesheet" type="text/css" href="backgroup.css?uuid=<?php echo uniqid();?>">
	<meta charset="utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<title>login</title>
</head>

<body class="body">

	<form class="formLogin" id="formulario" action="validarLogin.php" method="post">


		<div align="center"><img class="circular--square" src="img/img1.jpg" /></div>
				<br><br><br><br>
		<div class="color">
			<p><input type="text" name="usuario" class="campoUsuariologin" placeholder="mail"></p>
			<p><input type="password" name="clave" class="campoClavelogin" placeholder="password"></p>
			<p><input type="submit" name="" value="log in" class="btnEntrar"></p>
		
		<?php
 
			/* Iniciando la sesión*/
			session_start();
 
			/* Cambiar según la ubicación de tu directorio*/
			require_once __DIR__ . '/fb-login/src/Facebook/autoload.php';
 
			$fb = new Facebook\Facebook([
  			'app_id' => '1431073360392373',
  			'app_secret' => 'cda946de1960b07d5a1cd12acdee479e',
  			'default_graph_version' => 'v2.4',
			]);
  
			$helper = $fb->getRedirectLoginHelper();
  
			$permissions = ['email']; // Permisos opcionales
			$loginUrl = $helper->getLoginUrl('http://localhost/galeria/fb-callback.php', $permissions);
  
			/* Link a la página de login*/
			echo '<a href="' . htmlspecialchars($loginUrl) . '"><button class="btnEntrar">Login with Facebook!</button></a>';
 
		?>

		<p> <b><a href="registro.php" style="    color: #1074b9; 
    text-decoration: none;  font-size:12px; font-weight: bold;"> <span style="color:#565656">You do not have an account?</span> Sign up today</a></b></p>
</div>
	</form>



	<div class="portada" align="center" id="portada">
        <img id="logo" class="circular--square2" src="img/img1.jpg" />
		<div class="info"><p>what is siv ?</p>

			<p style="    font-size: small;
    color: #565656;">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.
			</p>

			</div>

			<div class="info2">

	
			<p>how siv works ?</p>
			<p style="    font-size: small;
    color: #565656;">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. 
			</p>
			</div>

			<div class="info3">
				<!--<a href="#formulario" style='color:white;text-decoration:none;'><button class="ingresar">ingresar</button></a>--!>
			</div>
		
	</div>


	

<script type="text/javascript">
	function ocultar_banner(){
		document.getElementById("logo").style.top="-70%";
		document.getElementById("logo").style.transition="600ms ease-in-out";
		document.getElementById("portada").style.top="-100%";
		document.getElementById("portada").style.transition="600ms ease-in-out";
		
	}


</script>


</body>

</html>	