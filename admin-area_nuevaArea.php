<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'nuevaArea'))
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
?>

<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<h5>Registra una nueva área</h5>
			</div>
		</div>
		
		


	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
									
<!--------------------------------------------------------- F	O	R	M	U	L	A	R	I	O----------------------------------------------->
				<form name="agregarArea" action="metodos.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="nuevaArea">
					
					<div class="form-group">
						<label>Nombre de la nueva área</label>
						<input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú]+" data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda no usar números ni caracteres especiales">
					</div>	
				
					<div class="form-group">					
						<label> Estatus de la nueva área</label>
							<select class="custom-select col-12" name="estatus">
								<option selected="">Seleciona estatus</option>
								<option value="Activo">Activo</option>
								<option value="Inactivo">Inactivo</option>
							</select>
					</div>						
						<input type="reset" class="btn btn-secondary" value="Limpiar">
						<input type="submit" class="btn btn-dark" value="Guardar">
				</form>
<!--------------------------------------------------------- F	O	R	M	U	L	A	R	I	O----------------------------------------------->
				
			</div>
		</div>			
		
		
		<div class="col-md-4 ">
			<div class="card-box height-100-p pd-20">
				<img src="vendors/images/area.jpg" alt="">
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