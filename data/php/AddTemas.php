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
				//echo $file_to_saved;
                $error = 0;
				if($_POST["des"] == null || $_POST["usu"] == null || $_POST["comment"] == null){
                    for ($i=0;$i<6;$i++){
                        echo "<br/><br/>";                    
                    }
					echo '<p style="color:red; text-align:center; font-size:20px; font-weight: bold;">ERROR: Hay que rellenar los campos obligatorios</p>';
					echo "<p style='text-align:center;'> <a href='../html/insertar.html'> Volver atras</a>";
                    $error = 1;
				}
				if($error == 0){
					//Inserción en xml
					$xml = simplexml_load_file('../xml/baseDeDatos.xml');
					$ultid=$xml['ult_id'];
					$id=$ultid+1;
					$tema = $xml->addChild('tema');
					$tema->addAttribute('id',$id);
					$xml['ult_id']=$id;
					$tema->addChild('descripcion', $_POST['des']); 
					$tema->addChild('creador',$_POST['usu']);
					$tema->addChild('tema_general',$_POST['rela']); 
					$tema->addChild('resumen',$_POST['comment']); 
					$tema->addChild('valoracion',0); 
					$tema->addChild('numres',0); 
					//Insercion identada:
					$xmlContent = formatXml($xml);
					$nuevoxml = new SimpleXMLElement($xmlContent);
					$nuevoxml->asXML('../xml/baseDeDatos.xml');

					for ($i=0;$i<6;$i++){
						echo "<br/><br/>";                    
					}
					echo '<p style="color:green; font-size:20px; font-weight: bold; text-align:center;">Pregunta insertada correctamente en el archivo xml</p>';
					echo '<p style="text-align:center"><a style="font-size=20;" href="visitas.php">Ver insertadas</a></p>';
				}
 ?>

    </div>
</body>
</html>

