<?php

sleep(4);
require"conexion.php";
$query="INSERT INTO `users`(`id`, `name`, `email`, `password`, `estado`, `data`,`pais`,`ciudad`,`idioma`) VALUES ('','".$_POST['usuario']."','".$_POST['email']."','".md5($_POST['clave'])."',0,0,'".$_POST['pais']."','".$_POST['ciudad']."','".$_POST['idioma']."')";


$consulta=mysqli_query($conexion,$query);



echo"<center><h1 style='color:grey;'>Gracias por registrarte en SIV</h1><p><a href='inicio.php' style='background-color: #26b94d;
    border: 3px solid #5aba4d;
    align-content: center;
    padding: 1%;
    text-decoration: none;
    width: 41%;
    margin-right: 1%;
    margin-left: 0%;
    border-radius: 0.1cm;
    cursor: pointer;
    color: white;
    transition: 600ms ease-out;'>Continuar</a></p></center>";
?>