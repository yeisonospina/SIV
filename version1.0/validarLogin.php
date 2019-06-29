<?php 
session_start();
require"conexion.php";
$query="SELECT * FROM users WHERE email='".$_POST['usuario']."' AND password='".md5($_POST['clave'])."'";

$consulta=mysqli_query($conexion,$query);
$registros=mysqli_num_rows($consulta);
if ($registros>0){

while ($fila=mysqli_fetch_array($consulta)) {
	foreach ($consulta as $campo =>$value) {

	if ($value['email']==$_POST['usuario'] && $value['password']=$_POST['clave']) {
		if($value['estado']==3){
		$_SESSION['estado']=$value['estado'];
		$_SESSION['usuario']=$value['name'];
		header("location:log1.php");
		}
		else{
		$_SESSION['estado']=$value['estado'];
		$_SESSION['usuario']=$value['name'];
		header("location:log.php");
		}
	}

     else{

        header('location:inicio.php');
     }

	

	
}



}

}

echo"datos incorrectos.  <a href='inicio.php'>Volver a inicio</a>";

?>	