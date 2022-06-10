<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'consultarArea'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Consulta de Áreas</title>
</head>

<body>

<?php
include_once('repositorios/encabezado.php');
include_once('repositorios/menuA.php');	
include_once("conexion.php")
?>
	
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<h5>Consulta de áreas</h5>
			</div>
		</div>
<!--------------------------------------------------------- F	O	R	M	U	L	A	R	I	O----------------------------------------------->		
		
	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
			<div class="container pd-0">
					<div class="timeline mb-30">
						<?php
						$consultaA = "SELECT * FROM `area`";
						$resultad = $conn->query($consultaA);
							while($fila = $resultad->fetch_array())
							{
								echo "<ul>";
								echo "<li>";
								echo "<div class='timeline-date'>";
								echo "$fila[2]";
								echo "</div>";

								echo "<div class='timeline-desc card-box'>";
								echo "<div class='pd-20'>";
								echo "<h4 class='mb-10 h4'>".$fila[0]." | ".$fila[1]. "&nbsp;&nbsp;&nbsp;&nbsp;
								<button class='btn btn-dark'><a href='admin-area_editarArea.php?nombre=$fila[0]' class='text-white'>Editar</a></button>";
								echo "</h4>";								
								echo "Última Actualización: $fila[3] </h4>";								
								echo "</div>";
								echo "</div>";
								echo "</ul>";
								echo "</li>";
							}
						?>
					</div>
				</div>
			<div id="chart5"></div>
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