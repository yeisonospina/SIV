
    	<?php

require "conexion.php";
$query="SELECT * FROM gustos WHERE 	Usuario='".$_SESSION['usuario']."'";
$resultado=mysqli_query($conexion,$query);
$registros=mysqli_num_rows($resultado);
if ($registros>0) {
    while ($fila=mysqli_fetch_array($resultado)) {
        foreach ($resultado as $registro) {
            echo "<tr><td class='tabla'>".$registro['Titulo1']."</td></tr>";
        }
    }
}

?>*/