<!DOCTYPE html>
<html>
<head>
<title>Visitas</title>
<meta charset="UTF-8"> 
<link rel="stylesheet" href="../style/estilos.css">
<script src="../js/insertar.js"></script>
</head>
<body>
<h1>Foro de temas:</h1>
<h3>No encuentras el tema del que quieres hablar? Crea un nuevo tema haciendo click 
<a href="javascript:insertar()">aquí</a></h3>
<div>
<fieldset class="oculto" id="campo">
    <legend>Introduce un nuevo tema</legend>
		<td><br>
		<form id='fquestion' name='fquestion' action="../php/AddTemas.php" method="POST">
			<script>insertar();</script>
			<label for="des">Tema:*</label>
			<input type="text" id="des" name="des" size="40"><br><br>
			<label for="usu">Nombre de Usuario:*</label>
			<input type="text" id="usu" name="usu" size="30"><br><br>
			<label for="rela">Relacionado con:* </label>
			<select name="rela" id="rela">
				<option value="Mecanica">Mecanica</option>
				<option value="Informatica">Informatica</option>
				<option value="Tecnologia">Tecnologia</option>
				<option value="Videojuegos">Videojuegos</option>
				<option value="Deportes">Deportes</option>
			 </select><br><br>
			<label id="labcom" for="comment">Cuerpo del tema:*</label><br><br>
			<textarea rows="4" cols="50" id= "comment"name="comment" form="fquestion"></textarea> <br><br>
			<input type="submit" id="boton" value="Enviar solicitud"><br>
		</form>
			</td>
	</fieldset>
    </div>
	<div>
	<br><br>
	<?php	
	$temas = simplexml_load_file('../xml/baseDeDatos.xml');
	foreach ($temas->xpath('//tema') as $tema)
	{
        $id=$tema['id'];
		$descripcion= $tema->descripcion;
		$creador=$tema->creador;
		$valoracion=$tema->valoracion;
		$numres=$tema->numres;
		
        echo "<table border='1' width='75%'><tr>";
		echo "<th><a href='mostrarComentarios.php?id=$id'>$descripcion 
</a></th></tr>";
		echo "<tr><td>";
        echo "<text class='fecha'>$creador</text>";
        echo "<text class='nombre'> &nbsp;&nbsp;&nbsp; valoracion:&nbsp; 
$valoracion &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $numres &nbsp; respuestas 
&nbsp;&nbsp;</text>";
        echo "</td></tr>";
        echo "</table><br><br><br>";
		}
	?> 
    


</div>
	</body>
</html>
