<?php 



?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="fuentes.css">
	<meta charset="utf-8">
  <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
 
<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Registro</title>
</head>
<body>








		<a href="index.php"><img class="circular--square3" src="img/img1.jpg" /></a>
		<center class="tituloregistro" id="info"><font color="grey">
provides the following information to complete your registration:</font></center>
		<form class="formRegistro" id="formulario" action="javascript:void(0);" method="post">
			<div class="registro2">
			<p class="tituloregistro2" >Register with:</p>
			<p><button class="facebook"><span translate="no">Facebook</span></button></p>
			<p><button class="google"> Google</button></p>
			</div>
			<div class="registro-externo" align="center">
				<p><input type="text" name="usuario" class="campoUsuarioreg" placeholder="Username"></p>
			<p><input type="password" name="clave" class="campoClavereg" placeholder="password"></p>
			<p><input type="password" name="confirmarclave" class="campoClavereg" placeholder="confirm password"></p>
			<p><input type="mail" name="email" placeholder="mail" class="campoClavereg"></p>
			<p><input type="text" name="pais" placeholder="country" class="campoClavereg"></p>
			<p><input type="text" name="ciudad" placeholder="country" class="campoClavereg"></p>
			<p><select name="idioma" class="campoClavereg">
					
						<option   value="ingles">English</option> 
						<option   value="espanol">Español</option> 
					
				</select>
			</p>
			<p><input type="button" name="" id="accion" value="check in"  onclick="registrar_usuario()" class="btnregistro"></p>
			
			</div>
		</form>


		<div id="respuesta">
			
		</div>

		<script type="text/javascript">
			
			function registrar_usuario(){
				 
				document.getElementById("formulario").style.display="none";
				document.getElementById("info").style.display="none";
				$.ajax({
					url:"registrar_usuario.php",
					data:$("#formulario").serialize(),
					type:"post",
					beforeSend:function(){
						$('#respuesta').html('<div style="margin-left: 26%;margin-top: 15%;"><img style="width:64%;"src="img/load1.gif" alt="loading"/></div>');
					},
					error:function(){
						$('#respuesta').html('error');
					},
					success:function(respuesta){
						$('#respuesta').html(respuesta);
					}
				});
			}
		</script>
		

</body>
</html>