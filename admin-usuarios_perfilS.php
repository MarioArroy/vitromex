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
				<h5>Perfil del Supervisor</h5>
			</div>
		</div>
		
		<div class="row">
			<?php
			$clave = $_REQUEST['clave'];
			$consulta = "SELECT * FROM supervisor WHERE `clave` = '$clave';";
							$resultado = $conn->query($consulta);
								if($resultado)
								{
									while($fila = $resultado->fetch_array())
									{
										echo "<div class='col-md-4'>";
										echo "<div class='pd-20 card-box height-100-p'>";
										
										echo "<div class='profile-photo'>";
										echo "<img src='vendors/images/sup.jpg' class='avatar-photo'>";
										echo "</div>";
										
										echo "<h5 class='text-center h5 mb-0'>$fila[1]</h5><br>";
										echo "<div class='profile-info'>";
										
										echo "<ul>";
										
										echo "<li>";
										echo "<span class='text-secondary'>Email:</span>";
										echo "<p style='font-size: 20px'>$fila[4]</p>";
										echo "</li>";
										
										echo "<li>";
										echo "<span class='text-secondary'>Área:</span>";
										echo "<p style='font-size: 20px'>$fila[5]</p>";
										echo "</li>";
										
										echo "<li>";
										echo "<span class='text-secondary'>Turno</span>";		
										echo "<p style='font-size: 20px'>$fila[2]</p>";	
										echo "</li>";	
										
										echo "<li>";
										echo "<span class='text-secondary'>Estatus</span>";		
										echo "<p style='font-size: 20px'>$fila[3]</p>";	
										echo "</li>";	
										
										echo "</ul>";
										
										echo "</div>";										
									}
																		
								}
			?>		
		</div>
	</div>
			
	<div class="col-md-8 ">
		<div class="card-box height-100-p overflow-hidden">
			<div class="profile-tab height-100-p">
				<div class="tab height-100-p">
					<ul class="nav nav-tabs customtab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#accidentes" role="tab">Accidentes ocurridos durante su turno</a>
						</li>										
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#actualizarD" role="tab">Actualizar sus datos</a>
						</li>
					</ul>
					
					<div class="tab-content">
						<!-- Timeline Tab start -->
					<div class="tab-pane fade show active" id="accidentes" role="tabpanel">
						<div class="pd-20">
							<?php
							$claveS = $_REQUEST['clave'];
								$consultaS = "SELECT * FROM accidentes WHERE supervisor_clave = $claveS;";
										$resultadoS = $conn->query($consultaS);
											if($resultadoS)
											{
												while($fila = $resultadoS->fetch_array())
												{
													echo "<div class='profile-timeline'>";

													echo "<div class='profile-timeline-list'>";

													echo "<ul>";
													echo "<li>";
													echo "<div class='date'>".$fila[5]."</div>";
													echo "<p><b>".$fila[0]."</b><br>";
													echo "<p>".$fila[1]."</p>";
													echo "<div class='task-time'>Turno: ".$fila[2]."</div>";
													echo "</li>";
													echo "</ul>";
													echo "</div>";

													echo "</div>";
												}
											}
							?>
						</div>
					</div>
						<!-- Timeline Tab End -->

					<div class='tab-pane fade height-100-p' id='actualizarD' role='tabpanel'>
						<div class='profile-setting'>
							<?php
							$correoS = $_REQUEST['correo'];
							$consultaSC = "SELECT * FROM `login`WHERE correo = '$correoS'";
									$resultadoSC = $conn->query($consultaSC);
										if($resultadoSC)
										{
											while($filaA = $resultadoSC->fetch_array())
											{
												echo "<ul class='profile-edit-list row'>";
												echo "<div class='col-md-11'>";
												echo "<h5>Datos del Supervisor</h5><hr>";

												echo "<p><b>Datos de Acceso</b></p>"; 
												echo "<div class='form-group'>"; 
												echo "<form action='metodos.php' method='post' enctype='mulpart/form-data'>";
												echo "<input type='hidden' name='opcion' value='actualizarSupervisor'>";

												echo "<label>Email</label>"; 
												echo "<input type='email' class='form-control'  name='correoS' value=".$filaA[0].">"; 
												echo "</div>"; 

												echo "<div class='form-group'>"; 
												echo "<label>Contraseña</label>"; 
												echo "<input type='password' class='form-control' name='contrasenaS' value=".$filaA[0].">"; 
												echo "</div>"; 

												echo "<input type='submit' class='btn btn-dark' value='Guardar'> &nbsp;"; 
												echo "<button class='btn btn-secondary'><a href='admin-usuarios_consultarUsuario.php' 
												class='text-white'>Cancelar</button>"; 

												echo "</form><br><br>"; 
												echo "</div>"; 
												echo "</div>"; 
												echo "</ul>"; 
											}
										}
						?>
						</div>
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