<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'editarArea'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Nueva Área </title>
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
				<h5>Edita el área</h5>
			</div>
		</div>
		
		


	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
				<div class="form-group">
					<label>Nombre del área</label>
					
					<?php
						$nombre = $_REQUEST['nombre'];
							$consulta = "SELECT * FROM area WHERE `nombre` = '$nombre';";
							$resultado = $conn->query($consulta);
								if($resultado)
								{
									while($fila = $resultado->fetch_array())
									{
										echo "<form action='metodos.php' method='post' enctype='multipart/form-data'>";
										echo "<input type='hidden' name='opcion' value='actualizarArea'>";
										
										echo "<input type='text' class='form-control'  name='nombreAA' value=".$fila[0]." >";
										echo "<div class='form-group'>";				
										echo "<label> Estatus de la nueva área</label>";	
										
										echo "<select class='custom-select col-12' name='estatusA'>";
										echo "<option selected=''>".$fila[1]."</option>";
										echo "<option value='Activo'>Activo</option>";
										echo "<option value='Inactivo'>Inactivo</option>";
										echo "</select>";
										
										echo "</div>";	
										echo "<input type='submit' class='btn btn-dark' value='Guardar'>";
									}
																		
								}
						?>
					
				</div>	
				</form>
			</div>
		</div>			
		
		
		<div class="col-md-4 ">
			<div class="card-box height-100-p pd-20">
				<img src="vendors/images/area.jpg" alt="">
					<div id="chart6"></div>
			</div>
		</div>
	</div>
</div>
</div>
	<br><br><br><br><br><br><br><br><br>
	
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