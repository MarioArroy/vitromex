<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'consultaObjetivoP'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Consulta de Objetivos de Producción</title>

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
				<h5>Consulta de Objetivos de Producción</h5>
			</div>
		</div>
		
		

		<div class="row">
			<div class="col-md-12">
				<div class="card-box">		
					<hr>
					<?php
						include_once("graficas/grafica-volumenP.php");
						echo "<br><br>";
						include_once("graficas/grafica-desperdicio.php");
						echo "<br><br>";
						include_once("graficas/grafica-calidad.php");
						echo "<br><br>";
						include_once("graficas/grafica-tiempoVacioH.php");
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