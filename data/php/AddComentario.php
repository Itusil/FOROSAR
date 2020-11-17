<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> 
<link rel="stylesheet" href="../style/estilos.css">
</head>
<body>
    <div>
		<?php
		//Identar inserción
		function formatXml($simpleXMLElement)
		{
			$xmlDocument = new DOMDocument('1.0');
			$xmlDocument->preserveWhiteSpace = false;
			$xmlDocument->formatOutput = true;
			$xmlDocument->loadXML($simpleXMLElement->asXML());

			return $xmlDocument->saveXML();
		}?>
	
		
		<?php 
                $error = 0;
				if($_POST["usu"] == null || $_POST["comment"] == null){
                    for ($i=0;$i<6;$i++){
                        echo "<br/><br/>";                    
                    }
					echo '<p style="color:red; text-align:center; font-size:20px; font-weight: bold;">ERROR: Hay que rellenar los campos obligatorios</p>';
					echo "<p style='text-align:center;'> <a href='../html/insertar.html'> Volver atras</a>";
                    $error = 1;
				}
                    if($error == 0){
					    //Inserción en xml
					    $temas = simplexml_load_file('../xml/baseDeDatos.xml');
						foreach ($temas->xpath('//tema') as $tema)
						{
							$id=$tema['id'];
							if($id == $_GET['id']){
							$ultidcom=$temas['ult_id_comentario'];
							$id=$ultidcom+1;
							$numero = $tema->numres;
							$tema->numres=$numero+1;
							$comentario=$tema->addChild('comentario');
							$comentario->addAttribute('id_comentario',$id);
							$temas['ult_id_comentario']=$id;
							$comentario->addChild('usuario', $_POST['usu']);
							$comentario->addChild('descripcionComentario', $_POST['comment']);
							$comentario->addChild('valoracionCom',0);
							}
						}
					    //Insercion identada:
					    $xmlContent = formatXml($temas);
					    $nuevoxml = new SimpleXMLElement($xmlContent);
					    $nuevoxml->asXML('../xml/baseDeDatos.xml');

                        // for ($i=0;$i<6;$i++){
                            // echo "<br/><br/>";                    
                        // }
					    // echo '<p style="color:green; font-size:20px; font-weight: bold; text-align:center;">Pregunta insertada correctamente en el archivo xml</p>';
					    // echo '<p style="text-align:center"><a style="font-size=20;" href="visitas.php">Ver insertadas</a></p>';
						$usuario_=$_POST['usu'];
						$id__=$_GET['id'];
						echo "<script>alert('Respuesta registrada correctamente, gracias $usuario_');window.location.href = 'mostrarComentarios.php?id=$id__';</script>";
					}
 ?>

    </div>
</body>
</html>

