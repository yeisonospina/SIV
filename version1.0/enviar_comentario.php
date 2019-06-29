<?php 
session_start();
require"conexion.php";
$fecha=date("y-m-d");
$query="INSERT INTO `comentarios`(`id_comentario`, `descripcion_comentario`, `usuario`, `fecha_comentario`) VALUES ('','".$_POST['sugerencia']."','".$_SESSION['usuario']."','".$fecha."')";
$resultado=mysqli_query($conexion,$query);

echo "Gracias por enviar tu comentario<br><a href='log1.php' style='color:skyblue;text-decoration:none;'>Volver</a>";

?>