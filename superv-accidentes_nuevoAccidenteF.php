<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'nuevoAccidenteSP'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Nuevo accidente</title>
</head>

<body>

<?php
include_once('repositorios/encabezadoS.php');
include_once('repositorios/menuS.php');	
include_once("conexion.php");
?>
	
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<h5>Registra un nuevo accidente</h5> 
			</div>
		</div>
		
	


	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
				
				<!--------------------------------------------------------- F	O	R	M	U	L	A	R	I	O	---------------------------------------------------->
				<form name="agregarAccidnete" action="metodos.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="opcion" value="agregarAccidenteS">
					
					<div class="form-group">
						<label>Nombre del trabajador</label>
						<input type="text" class="form-control" id="nombreT" name="nombreT" pattern="[A-Za-zÁÉÍÓÚáéíóú ]+" required>
					</div>

					<div class="form-group">
						<label>Descripción del accidente</label>
						<textarea class="form-control" rows="3" id="descripcionAT" name="descripcionAT" maxlength="400" required></textarea>
					</div>

					<div class="form-group">
						<select class="custom-select col-12" name="turnoT">
							<option selected="">Turno</option>
							<option value="Matutino">Matutino</option>
							<option value="Vespertino">Vespertino</option>
							<option value="Nocturno">Nocturno</option>
						</select>
					</div>

					<div class="form-group">
						<?php
							$consulta = "SELECT * FROM `area` WHERE `estatus` = 'Activo'";
							$resultado = $conn->query($consulta);
								if($resultado)
								{
									echo "<select class='custom-select col-12' name='areaT'>";
									echo "<option selected=''>Elige el Área</option>";
										while($fila = $resultado->fetch_array())
										{										
											echo "<option value='".$fila[0]."'>".$fila[0]." </option>";
										}
									echo "</select>";
								}
						?>	
					</div>			


					<div class="form-group">
						<?php
							$consulta = "SELECT * FROM `supervisor` WHERE `estatus` = 'Activo'";
							$resultado = $conn->query($consulta);
								if($resultado)
								{
									echo "<select class='custom-select col-12' name='supervisorT'>";
									echo "<option selected=''>Elige el supervisor a cargo</option>";
										while($fila = $resultado->fetch_array())
										{										
											echo "<option value='".$fila[0]."'>".$fila[1]." </option>";
										}
									echo "</select>";
								}
						?>
					</div>		
						<input type="submit" class="btn btn-dark" value="Guardar">
						<input type="reset" class="btn btn-secondary" value="Limpiar">
				</form>
				
				
					<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body text-center">
									<p style="font-size: 25px"><b>Días sin accidentes</b><br>
										369</p>
									
									<p>Gracias por su compromiso</p><hr>
									<p style="font-size: 25px" ><b>Último Record</b><br>
										36</p>
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
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