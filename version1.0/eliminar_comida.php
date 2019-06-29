<?php
require"conexion.php";
$query="UPDATE `favoritos` SET `estado`=0 WHERE id_favorito=".$_POST['comida']."";
$resultado=mysqli_query($conexion,$query);



?>