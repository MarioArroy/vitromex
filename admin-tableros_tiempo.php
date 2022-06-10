
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Tiempo</title>
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
				<h5>Activa/Desactiva el tablero de indicadores</h5>
			</div>
		</div>

<br><br><br><br>
	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
				
				<div class="form-group">
				<form name="estatus" action="metodos.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="tablerosEstatus">
					
					<label>Estatus del tablero</label>
					<?php
						/*$quer = Connection::getInstance()->query("SELECT `estatus` FROM tablero");*/
					
						$consulta = "SELECT `estatus` FROM tablero";
						$resultado = $conn->query($consulta);
							if($resultado)
							
								/*if($quer)*/
								{
									while($fila = $resultado->fetch_array())
									{
										echo "<select class='custom-select col-12' name='estatusT'>";
										echo "<option selected=''>".$fila[0]."</option>";
										echo "<option value='Activo'>Activo</option>";
										echo "<option value='Inactivo'>Inactivo</option>";
										echo "</select>";
									}
																		
								}
						?>
				</div>
					<input type="submit" class="btn btn-dark" value="Guardar">					
				</form>
			</div>
		</div>
	
		
		
		<div class="col-md-4 ">
			<div class="card-box height-100-p pd-20">				
				<img src="vendors/images/graficas.jpg" alt="">
					<div id="chart6"></div>
			</div>
		</div>
	</div>
</div>
</div>
	<br><br><br><br><br><br>
			
	

?>
	
<?php
include_once('repositorios/piePagina.php')
?>

</body>
</html>