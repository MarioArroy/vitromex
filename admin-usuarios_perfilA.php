<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'verU'))
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
				<h5>Perfil del Administrador</h5>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="card-box height-100-p pd-20">	
					<div class="pd-20 card-box height-100-p">
						<?php
						$clave = $_REQUEST['clave'];
						$consulta = "SELECT * FROM administrador WHERE `idadministrador` = '$clave';";
							$resultado = $conn->query($consulta);
								if($resultado)
								{
									while($fila = $resultado->fetch_array())
									{
										echo "<div class='profile-photo'>";
										echo "<img src='vendors/images/admin.png' class='avatar-photo'>";								
										echo "</div>";
										echo "<h5 class='text-center h5 mb-0'>$fila[1]</h5><br>";
										echo "<div class='profile-info'>";
										echo "<ul>";
										echo "<li>";
										echo "<span class='text-secondary'>Email:</span>";
										echo "<p style='font-size: 20px'>$fila[2]</p>";
										echo "</li>";								
										echo "</ul>";
										echo "</div>";
									}
								}
						?>
					</div>
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