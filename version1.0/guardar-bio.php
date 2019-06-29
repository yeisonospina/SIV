<?php 
session_start();
require "conexion.php";
$query="UPDATE `users` SET `bio`='".$_POST['bio']."' WHERE name ='".$_SESSION['usuario']."'";
var_dump($query);
$resultado=mysqli_query($conexion,$query);
var_dump($resultado);
echo "tu biografia se actualizo";

header("location:perfil.php");

 ?>