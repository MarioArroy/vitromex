<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'calidadM'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Calidad Mensual por Año</title>


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
				<h5>Calidad mensual por año</h5>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">		
					<hr>					
					<?php
						include_once("graficas/grafica-calidad.php")
					?>
				</div>
			</div>
		</div>
		
	</div>
</div>
<br>	
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