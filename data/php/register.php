<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
  <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="../style/estilos.css">
</head>
<body>
  <section class="main" id="s1">
    <div>
		<fieldset>
    <legend>Introduce tus datos</legend>
		<td><br>
		<form id='fquestion' name='fquestion' action="register.php" method="POST" enctype="multipart/form-data">
			<label for="email">Email:*</label>
			<input type="text" id="email" name="email" size="30"><br><br>
			<label for="nom">Nombre de usuario:</label>
			<input type="text" id="nom" name="nom" size="40"><br><br>
			<label for="pass">Contraseña:*</label>
			<input type="password" id="pass" name="pass" size="20"><br><br>
			<label for="pass2">Repetir contraseña:*</label>
			<input type="password" id="pass2" name="pass2" size="20"><br><br>
			<label for="fotoASubir">Insertar imagen:</label>
			<input type="file" accept="image/*" name="fotoASubir" id="fotoASubir"><br><br>
			<input type="submit" id="boton" value="Registrarse"><br><br>
		</form>
			</td>
	</fieldset>
	<?php include '../php/DbConfig.php' ?>
		<?php 
		//hacer el isset con tipop
		if (isset($_POST['email'])){
			$file_get = $_FILES['fotoASubir']['name'];
			$temp = $_FILES['fotoASubir']['tmp_name'];

			$file_to_saved = "../images/".$file_get; //Documents folder, should exist in       your host in there you're going to save the file just uploaded
			move_uploaded_file($temp, $file_to_saved);
			//echo $file_to_saved;
			$error = 0;
			if ($error==0){
				$link = new mysqli($server, $user, $pass, $basededatos);
				$sql = "INSERT INTO usuarios(email,NomUsu,contra,foto, valoracion) values('" . $_POST["email"] . "' ,'" . $_POST["nom"] . "' ,'" . $_POST["pass"] ."', '".$file_to_saved."' ,0)";
				if (!mysqli_query($link ,$sql))
					{
						die('Error: ' . mysqli_error($link));
					}
				echo '<script> window.alert("Usuario registrado correctamente!!"); window.location.href = "LogIn.php";</script> ';
				mysqli_close($link); 
			}
		}
 ?>
	
	
	
	
    </div>
  </section>
  
	<!--<script src="../js/ValidateFieldsQuestion.js"></script>-->
</body>
</html>

