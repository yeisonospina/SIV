<?php

session_start();


if (!isset($_SESSION['estado'])) {
	header('location:inicio.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Bienvenido</title>

</head>

<header>
<section class="wrapper">
		<button class="botonM"><a href="perfil.php"><img src="img/Iconos - SIV - Cuenta inactivo.png" alt="" width="60px"></a></button>
	<button class="botonR"><a href="favoritos.php"><img src="img/Iconos - SIV - Recetas inactivo.png" alt="" width="60px"></a></button>	
	
	<nav>
		
		
	<label class="registro" id="usuario">Welcome <?php echo $_SESSION['usuario'];?></label>
	<button class="login"><a href="inicio.php" style="color: gray;text-decoration: none;">Salir de la sesión</a></button>
	
	
	</nav>
</section>
</header>	






<body class="body" style="
    background-color: white;
">

  <div class="comentarios" align="center">
    <p><b>How can we improve?</b></p>
    <div align="center" class="upgrade">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.
    </div>
  </div>
  <div align="center">
  <form action="javascript:void(0);" id="formulario">
      <p><b>Leave us in detail what you would like us to improve</b></p>
      <textarea class="sugerencias" name="sugerencia">
        
      </textarea>
      <br><br>
      <button class="btnComentario" onclick="enviar_comentario()">Confirm</button>
  </form>
  </div>

  <div id="respuesta" align="center"></div>

<script type="text/javascript">
  function enviar_comentario(){
    $.ajax({  

      url:'enviar_comentario.php',
      data:$('#formulario').serialize(),
      type:'post',
      beforeSend:function(){
        $("#respuesta").html("procesando");
      },

      error:function(){
        $("#respuesta").html("error");
      },

      success:function(respuesta){
        $("#respuesta").html(respuesta);
      }

      });
    
  }
</script>
</body>
</html>
