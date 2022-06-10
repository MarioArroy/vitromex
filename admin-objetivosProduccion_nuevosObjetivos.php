<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'nuevoObjetivoP'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Nuevos Objetivos de Producción</title>
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
				<h5>Registra nuevos objetivos de Producción</h5>
			</div>
		</div>


	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
				
<!----------------------------------------------------	F	O	R	M	U	L	A	R	I	O	------------------------------------------------>
				<form name="agregarObjetivosP" action="metodos.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="objetivosProduccionM">
					<div class="form-group">				
						<label>Mes</label>
						<input class="form-control" placeholder="Seleccionar Mes" type="month" name="fechaVP" required>
					</div>
						
					<div class="form-group">
						<label>Volumen de producción</label>
						<input type="number" class="form-control" id="volumenPM" name="volumenPM" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0 y 9999" min="0" max="9999" required>
					</div>

					<div class="form-group">					
						<label> Desperdicio</label>
						<input type="number" class="form-control" id="desperdicioPM" name="desperdicioPM" step=".01" min="0.0" max="99.99" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 99.99" required>
					</div>

					<div class="form-group">
						<label>Calidad</label>
						<input type="number" class="form-control" id="calidaPM" name="calidadPM" step=".01" min="0.0" max="999.99" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 999.99" required>
					</div>
					<div class="form-group">					
						<label>Tiempo vacío de hornos</label>
						<input type="number" class="form-control" id="tiempoVHPM" name="tiempoVHPM" step=".01" min="0.0" max="99.99" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 99.99"required>
					</div>
						<input type="submit" class="btn btn-dark" value="Guardar">
						<input type="reset" class="btn btn-secondary" value="Limpiar">
				</form>
				</div>
			</div>
		
			<div class="col-md-4">
			<div class="card-box height-100-p pd-20">
				
<!----------------------------------------------------	F	O	R	M	U	L	A	R	I	O	------------------------------------------------>
				<form name="agregarObjetivosPF" action="metodos.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="objetivosProduccionF">
					<div class="form-group">				
						<label>Mes</label>
						<input class="form-control" placeholder="Seleccionar Mes" type="month" name="fechaVPF" required>
					</div>
						
					<div class="form-group">
						<label>Volumen de producción</label>
						<input type="number" class="form-control" id="volumenPM" name="volumenPF" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0 y 9999" min="0" max="9999" required>
					</div>

					<div class="form-group">					
						<label> Desperdicio</label>
						<input type="number" class="form-control" id="desperdicioPM" name="desperdicioPF" step=".01" min="0.0" max="99.99" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 99.99" required>
					</div>

					<div class="form-group">
						<label>Calidad</label>
						<input type="number" class="form-control" id="calidaPM" name="calidadPF" step=".01" min="0.0" max="999.99" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 999.99" required>
					</div>
					<div class="form-group">					
						<label>Tiempo vacío de hornos</label>
						<input type="number" class="form-control" id="tiempoVHPM" name="tiempoVHPF" step=".01" min="0.0" max="99.99" 
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 99.99"required>
					</div>
						<input type="submit" class="btn btn-dark" value="Guardar">
						<input type="reset" class="btn btn-secondary" value="Limpiar">
				</form>
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