 <?php
session_start();
require"conexion.php";
$fecha=date("y-m-d");
foreach ($_POST['img'] as $titulo ) {
	$query="INSERT INTO `gustos`(`id`, `Titulo1`, `Usuario`, `f_insert`) VALUES ('','".$titulo."','".$_SESSION['usuario']."','".$fecha."')";
	$consulta=mysqli_query($conexion,$query);
	$queryUpdate="UPDATE `users` SET `estado`=3 WHERE name='".$_SESSION['usuario']."'";
	$consulta=mysqli_query($conexion,$queryUpdate);
}

echo "<font color='white'>Los datos se han enviado correctamente</font>";



?>

<script type="text/javascript">
	setTimeout(function(){ location.href="log1.php"; }, 1000);
</script>