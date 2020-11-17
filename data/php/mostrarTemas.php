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
<fieldset id="fieldtemas">
<text style="color:blue; text-weight:bold; font-size=20px">Quieres ver temas de un campo en concreto? Selecciona uno y de la lista y haz click en buscar!</legend><br><br>
<form id="nuevotema" action='redirect.php' method="POST">
<select name="campo__" id="campo__">
				<option value="Mecanica">Mecanica</option>
				<option value="Informatica">Informatica</option>
				<option value="Tecnologia">Tecnologia</option>
				<option value="Videojuegos">Videojuegos</option>
				<option value="Deportes">Deportes</option>
</select><br><br>
<input type="submit" value="Buscar" ><br><br>
<?php
	if (isset($_GET['tema'])){
		echo "<text>Para volver a ver todos los temas haz click <a href='mostrarTemas.php'>aquí</a></text>";
	}?>
</form>
</fieldset>

<fieldset class="oculto" id="campo">
    <legend>Introduce un nuevo tema</legend>
		<td><br>
		<form id='fquestion' name='fquestion' action="../php/AddTemas.php" method="POST"  enctype="multipart/form-data">
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
			<label for="fotoASubir">Imagen (si lo desea):</label>
			<input type="file" accept="image/*" name="fotoASubir" id="fotoASubir"><br><br>
			
			<input type="submit" id="boton" value="Enviar solicitud"><br>
		</form>
			</td>
	</fieldset>
    </div>
	<div>
	<br><br>
	<?php	
	
	if (isset($_GET['tema'])){
		$temas = simplexml_load_file('../xml/baseDeDatos.xml');
		foreach ($temas->xpath('//tema') as $tema)
		{
			$tema_general = $tema->tema_general;
			if($tema_general == $_GET['tema']){
				$id=$tema['id'];
				$descripcion= $tema->descripcion;
				$creador=$tema->creador;
				$valoracion=$tema->valoracion;
				$numres=$tema->numres;
				$temageneral = $tema->tema_general;
				
				echo "<table border='1' width='75%'><tr>";
				echo "<th><a href='mostrarComentarios.php?id=$id'>$descripcion </a></th></tr>";
				echo "<tr><td>";
				echo "<text class='fecha'>$creador</text>";
				echo "<text class='nombre'> &nbsp;&nbsp;&nbsp; valoracion:&nbsp; $valoracion &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $numres &nbsp; respuestas &nbsp;&nbsp; Tema: $temageneral</text>";
				echo "</td></tr>";
				echo "</table><br><br><br>";
			}
			}
	}else{	
	$temas = simplexml_load_file('../xml/baseDeDatos.xml');
	foreach ($temas->xpath('//tema') as $tema)
	{
        $id=$tema['id'];
		$descripcion= $tema->descripcion;
		$creador=$tema->creador;
		$valoracion=$tema->valoracion;
		$numres=$tema->numres;
		$temageneral = $tema->tema_general;
		
        echo "<table border='1' width='75%'><tr>";
		echo "<th><a href='mostrarComentarios.php?id=$id'>$descripcion 
</a></th></tr>";
		echo "<tr><td>";
        echo "<text class='fecha'>$creador</text>";
		echo "<text class='nombre'> &nbsp;&nbsp;&nbsp; valoracion:&nbsp; $valoracion &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; $numres &nbsp; respuestas &nbsp;&nbsp; Tema: $temageneral</text>";
        echo "</td></tr>";
        echo "</table><br><br><br>";
		}
	}
	?> 
    


</div>
	</body>
</html>
