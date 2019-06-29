<?php
session_start();
require "conexion.php";
$_SESSION['gusto']=$_POST['gustos'];
foreach ($_FILES['imagen']['name'] as $key => $value) {
	foreach ($_FILES['imagen']['tmp_name'] as $key => $value2) {
		move_uploaded_file($value2, "img_recetas/".$value);
		$query="INSERT INTO `banner`(`id`, `titulo`,`ingredientes`,`preparacion`,`id_gusto`,`url_image`,`usuario`, `estado`, `orden`) VALUES ('','".$_POST['titulo']."','".$_POST['ingredientes']."','".$_POST['preparacion']."',".$_POST['gustos'].",'".$value."','".$_SESSION['usuario']."',1,1)"; 
		$resultado=mysqli_query($conexion,$query);
		var_dump($resultado);
		var_dump($query);
	}
}


echo "imagen guardada con exito";


?>