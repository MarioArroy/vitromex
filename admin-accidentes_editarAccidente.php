<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'editarAccidente'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Editar accidentes</title>
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
				<h5>Editar Accidentes</h5>
			</div>
		</div>
		
<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
				<?php
						$fecha = $_REQUEST['fecha'];
							$consulta = "SELECT * FROM accidentes WHERE `fechaR` = '$fecha';";
							$resultado = $conn->query($consulta);
								if($resultado)
								{
									while($fila = $resultado->fetch_array())
									{
										echo "<form action='metodos.php' method='post' enctype='multipart/form-data'>";
										echo "<input type='hidden' name='opcion' value='actualizarAccidente'>";
										
										echo "<div class='form-group'>";
										echo "<label>Nombre de la persona que sufrió el accidente</label>";
										echo "<input type='text' class='form-control'  name='nombreTA' value='$fila[0]' >";
										echo "</div>";
																			
										echo "<div class='form-group'>";
										echo "<label>Descripción del accidente</label>";
										echo "<textarea class='form-control' rows'3' name='descripcionATA'>$fila[1]</textarea>";
										echo "</div>";
										
										echo "<div class='form-group'>";
										echo "<label>Turno</label>";
										echo "<input type='text' class='form-control'  name='turnoTA' value='$fila[2]' >";	
										echo "</div>";
										
										echo "<div class='form-group'>";
										echo "<label>Área</label>";
										echo "<input type='text' class='form-control'  name='areaAA' value='$fila[6]' >";	
										echo "</div>";
										
										echo "<div class='form-group'>";
										echo "<label>Clave supervisor</label>";
										echo "<input type='text' class='form-control'  name='supervisorTA' value='$fila[7]' >";	
										echo "</div>";
										
										echo "<div class='form-group'>";
										echo "<label>Fecha del accidente</label>";
										echo "<input type='text' class='form-control'  name='fechaAA' value='$fila[4]' >";	
										echo "</div>";
										
										echo "<input type='submit' class='btn btn-dark' value='Guardar'>&nbsp;";
										echo "<button class='btn btn-secondary'><a href='admin-accidentes_consultaAccidente.php' class='text-white'>Cancelar</a></button>";
										
										echo "</form>";
									}
																		
								}
						?>
<!--------------------------------------------------------- F	O	R	M	U	L	A	R	I	O	---------------------------------------------------->
			</div>
		</div>
	
		
		
			<div class="col-md-4 ">
				<div class="card-box height-100-p pd-20">
					<h2 class="h4 mb-20">Ten en cuenta la seguridad. <br>Ella te cuidara la espalda.</h2>
					<br><br><br>
					<img src="vendors/images/prevenira.jpg" alt="">
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