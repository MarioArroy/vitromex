<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'consultaObjetivosE'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Consulta de Objetivos Energéticos</title>

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
				<h5>Consulta de Objetivos energéticos y Esmaltes</h5>
			</div>
		</div>
		
		
			
		


		<div class="row">
			<div class="col-md-12">
				<div class="card-box">		
					<hr>
					<?php
						include_once("graficas/grafica-consumoEnergiaElectrica.php");
						echo "<br><br>";
						include_once("graficas/grafica-desperdicioEsmaltes.php");	
						echo "<br><br>";
						include_once("graficas/grafica-consumoGN.php");
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