<?php 
session_start();
require "conexion.php";
foreach ($_FILES['img']['tmp_name'] as $key => $value) {
	foreach ($_FILES['img']['name'] as $key => $value2) {
		move_uploaded_file($value,"fotos_perfil/".$value2);
		$query="UPDATE users SET foto_perfil='".$value2."' WHERE name='".$_SESSION['usuario']."'";
		$resultado=mysqli_query($conexion,$query);
	}
}

header("location:perfil.php");


 ?>