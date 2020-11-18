	<?php include '../php/DbConfig.php' ?>
<?php 
	$temas = simplexml_load_file('../xml/baseDeDatos.xml');
	
	foreach ($temas->xpath('//tema') as $tema)
	{
		$id=$tema['id'];
		if($id == $_GET['id']){
			foreach($tema->comentario as $comentario){
				$id_com=$comentario['id_comentario'];
				if($_GET['idcom']==$id_com){
					$nomusu=$comentario->usuario;
					$valoracionact= $comentario->valoracionCom;
					$comentario->valoracionCom=$valoracionact+1;
					$aimprimir=$comentario->valoracionCom;
					$valacttema=$tema->valoracion;
					$tema->valoracion=$valacttema+1;
					$aimprimirtema=$tema->valoracion;
				}
			}
		$temas->asXML('../xml/baseDeDatos.xml');
		}
	}
	$link = new mysqli($server, $user, $pass, $basededatos);
	$valoracion = mysqli_query($link ,"SELECT usuarios.valoracion FROM 'usuarios' WHERE usuarios.NomUsu='$nomusu'");
	$sql = "UPDATE usuarios SET valoracion=valoracion +1 WHERE usuarios.NomUsu='$nomusu'";
	$valoracion = mysqli_query($link ,$sql);
	echo "$aimprimir <text style='color:green; font-weight: bold; text-align:center;'>Valoracion actualizada correctamente, gracias!</text>";
 ?>