<?php

session_start();

if($_SESSION['estado']==3){
	header("location:log1.php");
	die();
}

if (!isset($_SESSION['estado'])) {
	header('location:inicio.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css?n=1">
	<link rel="stylesheet" type="text/css" href="backgroup.css?n=1">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
<script type="text/javascript" src="js/cssrefresh.js"></script>
 
<meta http-equiv="Pragma" content="no-cache">
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Siv</title>
</head>
<body>
	
	 
	 	<button class="cerrarsesionP"><a href="inicio.php" style="    color: #60c765;
    text-decoration: none;">Cerrar sesion</a></button> 
	 		


	<div align="center" class="bienvenida"><label class="nombreusuarioS"><b>welcome</b> </label><label style="color: skyblue;"><b><?php echo $_SESSION['usuario'];?></b></label><p style="color:black;"><b>What kind of food do you prefer to eat?</b></p><p style="color:black;margin-top: -5%;"><b>Nos ayudara a seleccionar mejor las recetas</b></p></div>
	
		<form class="galeria" id="formulario" action="javascript:void(0);">
			
			<label class="chequeable" ><input type="checkbox" name="img[]" value="Ensaladas"><img src="img/Iconos - SIV - Ensaladas.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Postres"><img src="img/Iconos - SIV - Postres.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Pizza"><img src="img/Iconos - SIV - Pizza.png" width="120px" class="imagen"></label>
			<!--<label class="chequeable"><input type="checkbox" name="img[]" value="Pasta"><img src="img/Iconos - SIV - Pasta.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Pescado"><img src="img/Iconos - SIV - Pescado.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Curry"><img src="img/Iconos - SIV - Curry.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Sushi"><img src="img/Iconos - SIV - Sushi.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Sandwich"><img src="img/Iconos - SIV - Sandwich.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Arroz"><img src="img/Iconos - SIV - Arroz.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Sushi"><img src="img/Iconos - SIV - Sushi.png" width="120px" class="imagen"></label>
			<label class="chequeable"><input type="checkbox" name="img[]" value="Pescado"><img src="img/Iconos - SIV - Pescado.png" width="120px" class="imagen" ></label>
				<label class="chequeable"><input type="checkbox" name="img[]" value="Pasta"><img src="img/Iconos - SIV - Pasta.png" width="120px" class="imagen"></label>-->
			<button class="btnEnviar" onclick="enviar_datos()">confirm</button>
		</form>
<br><br><br><br><br><br>
		<div id="respuesta" style="margin-top: 26%;margin-left: 7%;">
			
		</div>

		<script type="text/javascript">
			function enviar_datos(){
				$.ajax({
					url:'enviar_nombre.php',
					data:$('#formulario').serialize(),
					type:'post',
					beforeSend:function(){
						$('#respuesta').html('procesando');
					},

					error:function(){
						$('#respuesta').html('hay un error');
					}, 

					success:function(respuesta){
						$('#respuesta').html(respuesta);
					}
				});
			}
		</script>

		

</body>
</html>