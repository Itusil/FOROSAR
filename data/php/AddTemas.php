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
				$file_get = $_FILES['fotoASubir']['name'];
				$temp = $_FILES['fotoASubir']['tmp_name'];
				$extensio= pathinfo($file_get, PATHINFO_EXTENSION);
				$file_to_saved = "../images/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
			
				if($temp != "" && $extensio != "jpeg"&& $extensio != "png" && $extensio != "jpg" && $extensio != "gif"){
					echo '<p style="color:red; text-align:center; font-size:20px; font-weight: bold;">ERROR:Archivo no es una imagen/p>';
                    $error = 1;				
				}else{
                    $error = 0;
				}
				if($error == 0){
					move_uploaded_file($temp, $file_to_saved);
					//Inserción en xml
					$xml = simplexml_load_file('../xml/baseDeDatos.xml');
					$ultid=$xml['ult_id'];
					$id=$ultid+1;
					$tema = $xml->addChild('tema');
					$tema->addAttribute('id',$id);
					$xml['ult_id']=$id;
					$tema->addChild('foto', $file_to_saved); 
					$tema->addChild('descripcion', $_POST['des']); 
					$tema->addChild('creador',$_POST['usu']);
					$tema->addChild('tema_general',$_POST['rela']); 
					$tema->addChild('resumemtema',$_POST['comment']); 
					$tema->addChild('valoracion',0); 
					$tema->addChild('numres',0); 
					//Insercion identada:
					$xmlContent = formatXml($xml);
					$nuevoxml = new SimpleXMLElement($xmlContent);
					$nuevoxml->asXML('../xml/baseDeDatos.xml');
					echo '<p style="color:green; font-size:20px; font-weight: bold; text-align:center;">Tema añadido correctamente</p>';
					echo '<p style="text-align:center"><a style="font-size=20;" href="mostrarTemas.php">Recargar pagina y ver resultado</a></p>';
					
				}
 ?>


