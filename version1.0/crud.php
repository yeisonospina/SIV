<?php
session_start();
require "conexion.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/39y3tllys1yds4qwlxncj6alq4fwkmjfgvhe38t1fb5f8tio/tinymce/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea',plugins: "lists",
  toolbar: "numlist bullist", setup: function (editor) {
      editor.on('change', function () {
          editor.save();
      });
  }});
 
</script>

</head>
<body>
<div align="center">
	<form action="javascript:void(0);" id="formulario" enctype="multipart/form-data">
	<p><input type="file" name="imagen[]"></p>
	<p>agrega el titulo de la comida</p>
	<input type="text" name="titulo">
	<p>agrega los ingredientes</p>
	<textarea name="ingredientes">
		
	</textarea>
	<p>agrega la preparacion</p>
	<textarea name="preparacion">
		
	</textarea>
	<p>Selecciona la comida</p>
	<p>
	<select name="gustos">
		<?php 

			$query="SELECT * FROM gustos ";
			$resultado=mysqli_query($conexion,$query);
			$registro=mysqli_num_rows($resultado);
			if ($registro>0) {
				while ($fila=mysqli_fetch_Array($resultado)) {
					foreach ($resultado as $key => $value) {
						echo "<option value='{$value['id']}'>{$value['Titulo1']}</option>";
					}
				}
			}
		 ?>
	</select>
	</p>
	<p><input type="button" name="" value="enviar" onclick="guardar_imagen()"></p>
	</form>
</div>

<div id="respuesta"></div>

<script type="text/javascript">
	
	function guardar_imagen(){
		var parametros= new FormData($("#formulario")[0]);
		$.ajax({
			url:'guardar_imagen.php',
			data:parametros,
			type:'post',
			contentType:false,
     		processData:false,

			beforeSend:function(){
				$("#respuesta").html("procesando datos");
			},
			error:function(){
				$("#respuesta").html("hay un error");
			},
			success:function(respuesta){
				$("#respuesta").html(respuesta);
			}
		});

 

	}
</script>
</body>
</html>		