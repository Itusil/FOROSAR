<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <script src="../js/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="../style/estilos.css">

</head>
<body>
  <section class="main" id="s1">
    <div>
		<fieldset>
    <legend>Introduce tu login</legend>
		<td><br>
		<form id='fquestion' name='fquestion' action="LogIn.php" method="POST" enctype="multipart/form-data">
			<label for="email">Email:</label>
			<input type="text" id="email" name="email" size="30"><br><br>
			<label for="pass">Contraseña:*</label>
			<input type="password" id="pass" name="pass" size="20"><br><br>
			<input type="submit" id="boton" value="Login"><br><br>
		</form>
			</td>
	</fieldset>
	<?php include '../php/DbConfig.php' ?>
		<?php 
		//hacer el isset con tipop
		if (isset($_POST['email'])){
				$bol=0;
				$link = new mysqli($server, $user, $pass, $basededatos);
				$sql = "SELECT * FROM usuarios WHERE usuarios.email='" . $_POST["email"] . "' AND	usuarios.contra='" . $_POST["pass"] . "'";
				$usuario = mysqli_query($link ,$sql);
				if(mysqli_num_rows($usuario) == 0){
					echo '<p style="color:red; font-size:20px; font-weight: bold;">LOGIN INCORRECTO</p>';
				}else{
					$row  = mysqli_fetch_array($usuario);
					$nomUsu = $row["NomUsu"];
					$foto = $row["foto"];
					echo "<script> window.alert('bienvenido usuario $nomUsu'); window.location.href = 'mostrarTemas.php?usu=$nomUsu&img=$foto'; </script> ";
				}	
				mysqli_close($link); 
			}
 ?>
	
	
	
	
    </div>
  </section>
</body>
</html>

