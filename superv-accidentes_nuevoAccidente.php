<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'nuevoAccidenteS'))
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
?>
	
<div class="main-container"><br><br><br><br><br><br><br><br><br><br>
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<h5 class="text-white">Registra un nuevo accidentedfgfdsacvbh</h5><button class="btn btn-dark" data-toggle="modal" data-target="#modal1">Registrar un nuevo Accidente</button>
			</div>
		</div>
		
		<div class="col-md-4 ">					
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel"><i class="icon-copy dw dw-warning"></i> Se actualizarán los días sin accidentes</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body">
							<p>El record se actualizará a 0 días del último accidente ocurrido <br>
							<b>¿Está seguro de actualizar el record?</b></p>
														
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<a href="superv-accidentes_nuevoAccidenteF.php" class="btn btn-dark">Aceptar</a>
						</div>
					</div>
				</div>
			</div>		
		</div>
		
		</div>
		</div>
		</div>
	</div>
</div>
	<br><br>

				
			

	<br><br><br><br><br><br><br><br>
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