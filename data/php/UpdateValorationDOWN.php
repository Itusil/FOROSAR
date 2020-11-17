<?php 
	$temas = simplexml_load_file('../xml/baseDeDatos.xml');
	
	foreach ($temas->xpath('//tema') as $tema)
	{
		$id=$tema['id'];
		if($id == $_GET['id']){
			foreach($tema->comentario as $comentario){
				$id_com=$comentario['id_comentario'];
				if($_GET['idcom']==$id_com){
					$valoracionact= $comentario->valoracionCom;
					$comentario->valoracionCom=$valoracionact-1;
					$aimprimir=$comentario->valoracionCom;
					$valacttema=$tema->valoracion;
					$tema->valoracion=$valacttema-1;
					$aimprimirtema=$tema->valoracion;
				}
			}
		$temas->asXML('../xml/baseDeDatos.xml');
		}
	}
	echo "$aimprimir <text style='color:red; font-weight: bold; text-align:center;'>Valoracion actualizada correctamente, gracias!</text>";
 ?>