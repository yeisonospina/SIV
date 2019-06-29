<?php 



?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="fuentes.css">
	<meta charset="utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Registro</title>
</head>
<body>
		<img class="circular--square3" src="img/img1.jpg" />
		<center class="tituloregistro" id="info"><font color="grey">Proporciona la siguiente información
para completar el registro:</font></center>
		<form class="formRegistro" id="formulario" action="javascript:void(0);" method="post">
			<div class="registro2">
			<p class="tituloregistro2" >Registrate con:</p>
			<p><button class="facebook">Con Facebook</button></p>
			<p><button class="google">Con Google</button></p>
			</div>
			<div class="registro-externo" align="center">
				<p><input type="text" name="usuario" class="campoUsuarioreg" placeholder="Nombre de usuario"></p>
			<p><input type="password" name="clave" class="campoClavereg" placeholder="Contraseña"></p>
			<p><input type="password" name="confirmarclave" class="campoClavereg" placeholder="Confirmar contraseña"></p>
			<p><input type="text" name="email" placeholder="Correo electronico" class="campoClavereg"></p>
			<p><input type="text" name="pais" placeholder="Pais" class="campoClavereg"></p>
			<p><input type="text" name="ciudad" placeholder="Ciudad" class="campoClavereg"></p>
			<p><input type="text" name="idioma" placeholder="Idioma preferido" class="campoClavereg"></p>
			<p><input type="button" name="" id="accion" value="Registrate"  onclick="registrar_usuario()" class="btnregistro"></p>
			
			</div>
		</form>


		<div id="respuesta">
			
		</div>

		<script type="text/javascript">
			
			function registrar_usuario(){
				 
				document.getElementById("formulario").style.display="none";
				document.getElementById("info").style.display="none";
				$.ajax({
					url:"crud_registrar_usuario.php",
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