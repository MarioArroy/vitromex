<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'perfilA'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Nuevo Usuario</title>
</head>

<body>
<?php
include_once('repositorios/encabezado.php');
include_once('repositorios/menuA.php');	
include_once("conexion.php");
?>

<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<h5>Mi Perfil</h5>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="card-box height-100-p pd-20">	
					<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
								<img src="vendors/images/admin.png" alt="" class="avatar-photo">								
							</div>
								<?php
								$correo = $_SESSION['correo'];
								$consulta = "SELECT * FROM `administrador` WHERE login_correo = '$correo'";
								$resultado = $conn->query($consulta);
								if($resultado)
								{
									while($fila = $resultado->fetch_array())
									{
										echo "<h5 class='text-center h5 mb-0'>".$fila[1]."</h5><br>";
										echo "<div class='profile-info'>";
										echo "<ul>";
										echo "<li>";
										echo "<span class='text-secondary'>Email:</span>";
										echo "<p style='font-size: 20px'>".$fila[2]."</p>";
										echo "</li>";								
										echo "</ul>";
										echo "</div>";
									}
								}
								?>
					</div>
				</div>
			</div>			


			<div class="col-md-4 ">
				<div class="card-box height-100-p pd-20">
				<h5>Actualiza tus datos</h5><hr>
					<?php
						$correo = $_SESSION['correo'];
						$consulta = "SELECT * FROM `administrador`, login WHERE administrador.login_correo = login.correo AND correo = '$correo'";
						$resultado = $conn->query($consulta);
						if($resultado)
						{
							while($fila = $resultado->fetch_array())
							{
								echo "<form action='metodos.php' method='post' enctype='multipart/dorm-data'>";
								echo "<input type='hidden' name='opcion' value='actualizarAdministrador'>";
								
								echo "<div class='form-group'>";					
								echo "<label>Email</label>";
								echo "<input type='email' class='form-control'  name='correoAD' value=".$fila[2].">";
								echo "</div>";

								echo "<div class='form-group'>";					
								echo "<label>Contraseña</label>";
								echo "<input type='password' class='form-control' name='contrasenaAD' value=".$fila[4].">";
								echo "</div>";

								echo "<input type='submit' class='btn btn-dark' value='Actualizar'> &nbsp;";
								echo "</form>";
							}
						}
						?>
					
					
				</div>
			</div>

			<div class="col-md-4 ">				
				<div class="card-box height-100-p pd-20">
					<h5>Recuerda actualizar tus datos de manera correcta</h5><hr>
					<img src="vendors/images/actualizar.jpg" alt="">
				</div>
			</div>
		</div>	
	</div>
</div>

	<br><br>
	<?php
}
else{
  header('Location:login.php');
}
?>	
<?php
include_once('repositorios/piePagina.php')
?>

</body>
</html>