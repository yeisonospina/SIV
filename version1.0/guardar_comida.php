<?php
	session_start();
	require "conexion.php";
	$query="INSERT INTO `favoritos`(`id_favorito`, `nombre_comida`, `nombre_usuario`, `estado`) VALUES ('','".$_POST['nombre']."','".$_SESSION['usuario']."',1)";
	$resultado=mysqli_query($conexion,$query);



?>