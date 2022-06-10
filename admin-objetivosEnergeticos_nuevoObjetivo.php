<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'nuevoObjetivoE'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Nuevos Objetivos Energéticos</title>
</head>

<body>
<?php
include_once('repositorios/encabezado.php');
include_once('repositorios/menuA.php');	
?>
	
	
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30 col-8">
			<div class="row align-items-center">
				<h5>Registra nuevos Objetivos energéticos y Esmaltes</h5>
			</div>
		</div>


	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
				
				<form name="agregarObjetivosE" action="metodos.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="objetivosEnergeticosM">

					<div class="form-group">
						<label>Mes</label>
						<input class="form-control" placeholder="Seleccionar Mes" type="month" name="fechaEM">
					</div>

					<div class="form-group">				
						<label>Consumo de la Energía Eléctrica(Kw/m2)</label>
						<input type="number" class="form-control" id="consumoEEM" name="consumoEEM" step=".01" min="0.0" max="999.99" required
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 999.99">
					</div>

					<div class="form-group">					
						<label> Desperdicio de Esmaltes (%)</label>
						<input type="number" class="form-control" id="desperdicioEM" name="desperdicioEM" step=".01" min="0.0" max="99.99" required
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 99.99">
					</div>

					<div class="form-group">
						<label>Consumo de Gas Natural (Kcal/Kg)</label>
						<input type="number" class="form-control" id="consumoGNM" name="consumoGNM" min="0" max="9999" required
						data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0 y 9999">
					</div>
						<input type="submit" class="btn btn-dark" value="Guardar">
						<input type="reset" class="btn btn-secondary" value="Limpiar">
				</form>
				
			</div>
		</div>			
		
		
		<div class="col-md-4 ">
			<div class="card-box height-100-p pd-20">
				<h6>Objetivos alcanzados al final del mes</h6>
				<hr>
					<form name="agregarObjetvosEF" action="metodos.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="objetivosEnergeticosF">
						
						<div class="form-group">
							<label>Mes</label>
							<input class="form-control" placeholder="Seleccionar Mes" type="month" name="fechaEF">
						</div>
						
						<div class="form-group">				
							<label>Consumo de la Energía Eléctrica(Kw/m2)</label>
							<input type="number" class="form-control" id="consumoEEF" name="consumoEEF" step=".01" min="0.0" max="999.99" required
							data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 999.99">
						</div>

						<div class="form-group">					
							<label> Desperdicio de Esmaltes (%)</label>
							<input type="number" class="form-control" id="desperdicioEF" name="desperdicioEF" step=".01" min="0.0" max="99.99" required
							data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0.0 y 99.99">
						</div>

						<div class="form-group">
							<label>Consumo de Gas Natural (Kcal/Kg)</label>
							<input type="number" class="form-control" id="consumoGNF" name="consumoGNF" min="0" max="9999" required
							data-toggle="tooltip" data-placement="top" title="" data-original-title="Recuerda usar valores entre 0 y 9999">
						</div>
							<input type="submit" class="btn btn-dark" value="Guardar">
							<input type="reset" class="btn btn-secondary" value="Limpiar">
					</form>
			</div>
		</div>
	</div>
</div>
</div>
	<br><br><br><br><br>
	
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