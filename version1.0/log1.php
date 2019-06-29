<?php

session_start();


if (!isset($_SESSION['estado'])) {
	header('location:inicio.php');
}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css?uuid=<?php echo uniqid();?>">
       <link rel="stylesheet" type="text/css" href="style.css?uuid=<?php echo uniqid();?>">
    <meta charset="UTF-8">
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<title>Bienvenido</title>

</head>

<header>
<section class="wrapper">
    <button class="botonM"><a href="perfil.php"><img src="img/Iconos - SIV - Cuenta inactivo.png" alt="" width="50px"></a></button>
    <a href="log1.php"><img  class="logo" src="img/SIV.png" height="50px" width="60px"> </a>
	<button class="botonR"><a href="favoritos.php"><img src="img/Iconos - SIV - Recetas inactivo.png" alt="" width="50px"></a></button>	
	
	<nav>
		
		
  <label class="registro" id="usuario">Bienvenido <?php echo $_SESSION['usuario'];?></label>
  
  
	<button class="login"><a href="inicio.php" style="color: gray;text-decoration: none;">Salir de la sesion</a></button>
	
	
	</nav>
</section>
</header>	

<body class="body" style="
    background-color: white;
">


	
    	<table >
				<br><br><br><br>

        <?php 
        require "conexion.php";
        $query="SELECT * FROM `banner`";
        $resultado=mysqli_query($conexion,$query);
        $registro=mysqli_num_rows($resultado);
        if ($registro>0) {
          while ($fila=mysqli_fetch_array($resultado)) {
            foreach ($resultado as $key => $value) {
              ?>

               <form  name="javascript:void(0);" id="formulario<?php  echo $value['id'];?>">
                <form name="javascript:void(0);" id="formularios<?php  echo $value['id'];?>">
    <div class="demo__card" id="receta<?php echo $value['id'];?>">
    <div class="demo">
  
  <div class="demo__content">
    <div class="demo__card-cont">
  
      
      
        <div class="demo__card__top purple" style="background-image:url('img_recetas/<?php echo $value['url_image'];?>');background-repeat:no-repeat;background-size:cover;">
          
          <p class="demo__card__name"><input type="text" name="nombre" id="nombre" value="<?php echo $value['titulo'];?>" style="display:none;"><?php echo $value['titulo'];?></p>
        </div>
        <div class="demo__card__btm">
          
        </div>
          <p class="demo__card__we">
              
    </p>
        
        <div class="demo__card__choice m--reject"></div>
        <div class="demo__card__choice m--like"></div>
        <div class="demo__card__drag"></div>

     
      </div>
    </div>
    <p class="demo__tip"><div class="divreceta"><p>ingredients:</p> <br><?php echo utf8_encode( $value['ingredientes']);?><br></p>
          <p  >preparation:</p><p><?php echo utf8_encode($value['preparacion']); ?></p>
          <p style="text-align: center;"> Was delicious ?</p>
          <div align="center"><img src="img/Iconos - SIV - No me gusta.png" width="50px"><img src="img/Iconos - SIV - Indiferente.png" width="50px"><img src="img/Iconos - SIV - Me gusta.png" width="50px"></div>

           <p style="text-align: center">Was it difficult to cook it?</p>
            <div align="center"><img src="img/Iconos - SIV - No me gusta.png" width="50px" onclick='dislike()'>
            <img src="img/Iconos - SIV - Indiferente.png" width="50px" onclick='indiferent()'>
            <img src="img/Iconos - SIV - Me gusta.png" width="50px" onclick='like()'></div>

            <p style="text-align: center;"> Do you have any suggestion ?</p>
            <div align="center"><a href="comentarios.php"><img src="img/pregunta.png" width="50px"></a></div>
            
        </div>

        


         

  </div>
<img src="img/Iconos - SIV - Cancelar inicio.png" class='eliminar' onclick="ocultar()">

<img src="img/Iconos - SIV - Recetas inicio.png"  class='recetas'  onclick="guardar_comida<?php echo $value['id'];?>()">
</div>



</div>

  

</form>

</form>
  


  
    <div id="respuesta">
      
    </div>

    <script type="text/javascript">
      function guardar_comida<?php echo $value['id'];?>(){
        $.ajax({
          url:"guardar_comida.php",
          data: $("#formulario<?php echo $value['id'];?>").serialize(),
          type:"post",
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

      function ocultar_comida(){
        document.getElementById("receta<?php echo $value['id'];?>").style.display="none";
         $.ajax({
          url:"eliminar_receta  .php",
          data: $("#formularios<?php echo $value['id'];?>").serialize(),
          type:"post",
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



    <script type="text/javascript">
      $(document).ready(function() {

  var animating = false;
  var cardsCounter = 0;
  var numOfCards = <?php echo $registro;?>;
  var decisionVal = 80;
  var pullDeltaX = 0;
  var deg = 0;
  var $card, $cardReject, $cardLike;

  function pullChange() {
    animating = true;
    deg = pullDeltaX / 10;
    $card.css("transform", "translateX("+ pullDeltaX +"px) rotate("+ deg +"deg)");

    var opacity = pullDeltaX / 100;
    var rejectOpacity = (opacity >= 0) ? 0 : Math.abs(opacity);
    var likeOpacity = (opacity <= 0) ? 0 : opacity;
    $cardReject.css("opacity", rejectOpacity);
    $cardLike.css("opacity", likeOpacity);
  };

  function release() {

    if (pullDeltaX >= decisionVal) {
      $card.addClass("to-right");
    } else if (pullDeltaX <= -decisionVal) {
      $card.addClass("to-left");
    }

    if (Math.abs(pullDeltaX) >= decisionVal) {
      $card.addClass("inactive");

      setTimeout(function() {
        $card.addClass("below").removeClass("inactive to-left to-right");
        cardsCounter++;
        if (cardsCounter === numOfCards) {
          cardsCounter = 0;
          $(".demo__card").removeClass("below");

        }
      }, 300);
    }

    if (Math.abs(pullDeltaX) < decisionVal) {
      $card.addClass("reset");
    }

    setTimeout(function() {
      $card.attr("style", "").removeClass("reset")
        .find(".demo__card__choice").attr("style", "");

      pullDeltaX = 0;
      animating = false;
    }, 300);
  };

  $(document).on("mousedown touchstart", ".demo__card:not(.inactive)", function(e) {
    if (animating) return;

    $card = $(this);
    $cardReject = $(".demo__card__choice.m--reject", $card);
    $cardLike = $(".demo__card__choice.m--like", $card);
    var startX =  e.pageX || e.originalEvent.touches[0].pageX;

    $(document).on("mousemove touchmove", function(e) {
      var x = e.pageX || e.originalEvent.touches[0].pageX;
      pullDeltaX = (x - startX);
      if (!pullDeltaX) return;
      pullChange();
    });

    $(document).on("mouseup touchend", function() {
      $(document).off("mousemove touchmove mouseup touchend");
      if (!pullDeltaX) return; // prevents from rapid click events
      release();
    });
  });

});
    </script>

              <?php


            }
          }
        }


         ?>
       
    </table>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  


</body>
</html>
			