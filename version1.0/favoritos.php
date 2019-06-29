<?php

session_start();


if (!isset($_SESSION['estado'])) {
	header('location:inicio.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="estilos.css?n=1">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
<script type="text/javascript" src="js/cssrefresh.js"></script>
 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Bienvenido</title>

</head>

<header>
<section class="wrapper">
		<button class="botonM"><a href="perfil.php"><img src="img/Iconos - SIV - Cuenta inactivo.png" alt="" width="50px"></a></button>
		<a href="log1.php"><img  class="logo" src="img/SIV.png" height="50px" width="60px"> </a>
		<button class="botonR"><a href="#"><img src="img/Iconos - SIV - Recetas activo.png" alt="" width="50px"></a></button>	
	
	<nav>
		
		
	<label class="registro" id="usuario">Bienvenido <?php echo $_SESSION['usuario'];?></label>
	<button class="login"><a href="inicio.php" style="color: gray;text-decoration: none;">Salir de la sesión</a></button>
	
	
	</nav>
</section>
</header>	






<body>


	
    	
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="./script.js"></script>


	<div align="center" class="inforeceta">The recipes that you liked are stored here for 24 hours,
Add them to your favorites now!</div>

<div class="botones3" align="center">
		<img src="img/Iconos - SIV - Recetas inicio.png"  class='favoritos3'><b><a href="log1.php" class="texto_receta3">recipe book</a></b>
	</div>
 
      <table align="center" class="tabla_favoritos">
      	
      		
      			<?php 
      				require "conexion.php";
      				$query="SELECT * FROM favoritos WHERE nombre_usuario='".$_SESSION['usuario']."'";
      				$resultado=mysqli_query($conexion,$query);
      				$registros=mysqli_num_rows($resultado);
      				if ($registros>0) {

      					while ($fila=mysqli_fetch_array($resultado)) {
      					 	foreach ($resultado as $registro => $value) {
      					 		if ($value['estado']!=0) {
      					 			# code...
      					 		
      					 		echo "
      					 <form action='javascript:void(0);' id='formulario".$value['id_favorito']."'>
      					
      					 		<tr style='' id='registro".$value['id_favorito']."'>
      					 		<td><input type='text' name='comida' value='".$value['id_favorito']."' id='comida".$value['id_favorito']."' style='display:none;'><img src='img/Iconos - SIV - Recetas inicio.png' width='35px' style=' margin-top: 12px;'>
      					 		</td>
      					 		<td style='border-bottom:1px solid skyblue;'><a href='log1.php' style='color:black;text-decoration:none;'>".$value['nombre_comida']."</td>

								<td><img src='img/Iconos - SIV - Cancelar.png' width='20px' class='eliminar_registro'  onclick='eliminar_comida".$value['id_favorito']."()'></td>

								</tr>
						
						</form>

						";

						?>
	
	<script>

		function eliminar_comida<?php echo $value['id_favorito']; ?>(){
			document.getElementById('registro<?php echo $value['id_favorito']; ?>').style.display="none";
			$.ajax({
				url:'eliminar_comida.php',
				data:$('#formulario<?php echo $value['id_favorito']; ?>').serialize(),
				type:'post',
				
				success:function(registro){
					$('#registro<?php echo $value['id_favorito']; ?>').html(registro);
				}
				});
		}

	</script>
	<?php

								}
      					 	}
      					}
      				}
      			?>
      	
      	
      </table>
    

   
    
</body>
</html>
