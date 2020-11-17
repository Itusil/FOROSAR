<!DOCTYPE html>
<html>
<head>
<title>Visitas</title>
<meta charset="UTF-8"> 
<link rel="stylesheet" href="../style/estilos.css">
</head>
<body>
<div>
<script src="../js/anadir.js"></script>
<h3><a href="mostrarTemas.php">Volver a ver los temas</a></h3>
	<?php	
	$temas = simplexml_load_file('../xml/baseDeDatos.xml');
	foreach ($temas->xpath('//tema') as $tema)
	{
        $id=$tema['id'];
		if($id == $_GET['id']){
		echo "<h1>Tema:$tema->descripcion</h1>";
		echo "<h2>Creado por: $tema->creador</h3>";
		echo "<h2>Categoria: $tema->tema_general</h3>";
		echo "<h3>Resumen: $tema->resumemtema</h3>";
				$foto=$tema->foto;
		if($foto != "../images/"){		
			echo "<img src='$foto' width='200px'>";
		}
		
		echo "<h3>Valoracion: <text id='valtema'>$tema->valoracion</text></h3>";
		echo "<h3>$tema->numres comentarios:</h3>";

		foreach ($tema->comentario as $comentario)
		{	
			$id_com=$comentario['id_comentario'];
			$usuario=$comentario->usuario;
			$descripcionComentario=$comentario->descripcionComentario;
			$valoracionCom=$comentario->valoracionCom;
			echo "<table border='1' width='75%'><tr>";
			echo "<th><text class='fecha'>$usuario</text><text style='text-align:left;color:green;'> Valoracion: <a href='javascript:subirval($id, $id_com)'>&uarr;<a/><text id='com$id$id_com'>$valoracionCom</text><a href='javascript:bajarval($id, $id_com)'>&darr;</a></text></th></tr>";
			echo "<tr><td>";
			echo "<text>$descripcionComentario</text>";
			echo "</td></tr>";
			echo "</table><br><br><br>";
		}
		}
	}
	?> 
	<fieldset id="campo">
    <legend>Introduce un nuevo comentario</legend>
		<td><br>
		<form id='fquestion' name='fquestion' action="../php/AddComentario.php?<?php $id=$_GET["id"]; echo "id=$id&";?>" method="POST">
			<label for="usu">Nombre de Usuario:*</label>
			<input type="text" id="usu" name="usu" size="30"><br><br>
			<label id="labcom" for="comment">Comenatario del tema:*</label><br><br>
			<textarea rows="4" cols="50" id= "comment"name="comment" form="fquestion"></textarea> <br><br>
			<input type="submit" id="boton" value="Enviar solicitud"><br>
		</form>
			</td>
	</fieldset>
    


</div>
	</body>
</html>
