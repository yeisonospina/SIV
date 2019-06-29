<?php

session_start();

require "conexion.php";

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css?n=1">
	
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Bienvenido</title>

</head>

<header>
<section class="wrapper">
		<button class="botonM"><a href="#"><img src="img/Iconos - SIV - Cuenta activo.png" alt="" width="50px"></a></button>
		<a href="log1.php"><img  class="logo" src="img/SIV.png" height="50px" width="60px"> </a>
		<button class="botonR"><a href="favoritos.php"><img src="img/Iconos - SIV - Recetas inactivo.png" alt="" width="50px"></a></button>	
	
	<nav class="navbar">
	 	<button class="cerrarsesionP"><a href="inicio.php" style="    color: #60c765;
    text-decoration: none;">Cerrar sesion</a></button> <label class="nombreusuario">Welcome	 <?php echo $_SESSION['usuario'];?></label>
	 		
	</nav>
</section>
</header>	

<body>
	<div align="center">
		<?php 

			$query="SELECT foto_perfil FROM users WHERE name='".$_SESSION['usuario']."'";
			$resultado=mysqli_query($conexion,$query);
			$registro=mysqli_num_rows($resultado);
			if ($registro>0) {
				while ($fila=mysqli_fetch_array($resultado)) {
					foreach ($resultado as $key => $value) {
						echo "<img src='fotos_perfil/".$value['foto_perfil']."' class='perfil' style='cursor: pointer;' onclick='mostrarmodal1()'>";
					}
				}
			}
			

		 ?>
	
	</div>
	<div class="usuario" align="center">
		<p style="color: #4cc1fc;;font-size: 1.6em;"><?php echo $_SESSION['usuario'] ?></p>
	</div>


	<div class="biografia">
		<p><img src="img/Iconos - SIV - Editar.png" width="20px" style="margin-left: -6%;cursor:pointer;" onclick="document.getElementById('modal2').style.display='block';"><b>Bio:</b></p>
		<?php
			$query="SELECT bio FROM users WHERE name='".$_SESSION['usuario']."'";
			$resultado=mysqli_query($conexion,$query);
			$registro=mysqli_num_rows($resultado);
			if ($registro==0) {
				echo "Escribe algo en tu biografia";
			}

			if ($registro>0) {
				while ($fila=mysqli_fetch_array($resultado)) {
					foreach ($resultado as $key => $value) {
						echo "<font color='black'><b>".$value['bio']."</b></font>";
					}
				}
			}
		?>
	</div>

	<div class="botones" align="center">
		<img src="img/Iconos - SIV - Recetas inicio.png"  class='favoritos2'><b><a href="favoritos.php" class="texto_receta"> Recipe book</a></b>
	</div>
	<br><br><br><br>
	<div align="center" class="bienvenida2"> 
		<p><b>Welcome</b>  <label style="color: skyblue;"><b><?php echo $_SESSION['usuario'] ?></b></label></p>
	</div>

	<div align="center"><p><b><a href="inicio.php" style="color: red; text-decoration: none;">Sign off</a></b></p></div>

	<div align="center" class="foto" id="modal1" style="display: none;">
		<form action="guardar-foto.php" enctype="multipart/form-data" method="post" id="form1">
			<p>Sube una foto de tu galeria</p>
			<p><input type="file" name="img[]"></p>
     		<p><input type="submit" class="btnComentario" value="enviar"></p>
     		<p><a href="#" style="color: red;text-decoration: none;" onclick="document.getElementById('modal1').style.display='none';">Cerrar ventana</a></p>
		</form>

	</div>

	<div align="center" class="bio" id="modal2">
		<form action="guardar-bio.php" method="post" id="form2">
			<p>Por favor, añade texto a tu biografia</p>
			<textarea class="sugerencias" name="bio">
        
      		</textarea>
      		<p><input type="submit" class="btnComentario"></p>
      		<p><a href="#" style="color: red;text-decoration: none;" onclick="document.getElementById('modal2').style.display='none';">Cerrar ventana</a></p>
		</form>
		
	</div>



<script type="text/javascript">
	function mostrarmodal1(){
		document.getElementById('modal1').style.display='block';
	}
</script>
		

</body>


</html>