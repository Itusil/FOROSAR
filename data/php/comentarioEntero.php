	<?php	
	$visitas = simplexml_load_file('../xml/visitas.xml');
	foreach ($visitas->xpath('//visita') as $visita)
	{
        $id=$visita['id'];
        $comentario=$visita->comentario;
        if($id == $_GET['id']){
            echo "$comentario";
        }
		}
	?> 
