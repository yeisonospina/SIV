<?php 

#$conexion=new mysqli("sql110.mipropia.com","mipc_24047425","123456","mipc_24047425_siv");
$conexion=new mysqli("localhost","root","","prueba");



if($conexion->connect_error){
	echo "error en la conexion de la bd";
}

else
{
	//echo "conexion establecida";
}


?>