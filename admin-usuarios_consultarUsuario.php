<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'consultaU'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Consulta de Usuario</title>
</head>

<body>
<?php
include_once('repositorios/encabezado.php');
include_once('repositorios/menuA.php');	
include_once("conexion.php")
?>

<div class="main-container">	
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<h5>Consulta de Usuarios</h5>
			</div>
		</div>
	

					

			<div class="row">
				<div class="col-md-12">
						<div class='contact-directory-list'>
							<ul class='row'>
								<?php
									$consultaS = "SELECT * FROM `supervisor`";
									$resultadoS = $conn->query($consultaS);
										while($fila = $resultadoS->fetch_array())
										{
											echo "<li class='col-md-4'>";
											echo "<div class='contact-directory-box'>";
											echo "<div class='contact-dire-info text-center'>";
											echo "<div class='contact-avatar'>";
											echo "<span>";
											echo "<img src='vendors/images/sup.jpg'>";
											echo "</span>";
											echo "</div>";
											echo "<div class='profile-sort-desc'>";
											echo "<p>".$fila[1]." - ".$fila[0]."</p>";
											echo "<p>".$fila[3]."</p>";
											echo "</div>";
											echo "<div class='contact-skill'>";
											echo "<span class='badge badge-pill'>".$fila[2]."</span>";
											echo "<span class='badge badge-pill'>".$fila[5]."</span>";
											
											echo "</div>";
											echo "</div>";
											echo "<div class='view-contact'>";
											echo "<a href='admin-usuarios_perfilS.php?clave=$fila[0]&correo=$fila[4]'>"."Ver Perfil"."</a>";
											echo "</div>";
											echo "</div>";
											echo "</li>";
										}
								?>
						 </ul>
					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-md-12">
						<div class='contact-directory-list'>
							<ul class='row'>								
								<?php
									$consultaS = "SELECT * FROM `administrador`";
									$resultadoS = $conn->query($consultaS);
										while($fila = $resultadoS->fetch_array())
										{
											echo "<li class='col-md-4'>";
											echo "<div class='contact-directory-box'>";
											echo "<div class='contact-dire-info text-center'>";
											echo "<div class='contact-avatar'>";
											echo "<span>";
											echo "<img src='vendors/images/admin.png'>";
											echo "</span>";
											echo "</div>";
											echo "<div class='profile-sort-desc'>";
											echo "<p>".$fila[1]."</p>";
											echo "</div>";
											echo "<div class='contact-skill'>";
											echo "<span class='badge badge-pill'>Administrador</span>";
											echo "</div>";
											echo "</div>";
											echo "<div class='view-contact'>";
											echo "<a href='admin-usuarios_perfilA.php?clave=$fila[0]'>"."Ver Perfil"."</a>";
											echo "</div>";
											echo "</div>";
											echo "</li>";
										}
								?>
						 </ul>
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
include_once('repositorios/piePagina.php');
?>

</body>
</html>

