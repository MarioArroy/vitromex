
<html>
<head>
<meta charset='utf-8'>
<?php
include_once('repositorios/scripts.php');
include_once("conexion.php");
?>
<title>Vitromex</title>
</head>
<body>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php">
					<img src="vendors/images/vitromex_logo.png" alt="">
				</a>
			</div>
			<div>
				<ul>
					<li><a href="login.php" style="color:#000000">Iniciar Sesión</a></li>					
				</ul>				
			</div>
		</div>
	</div>
	
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12" align="center">
					<?php
					/*$quer = Connection::getInstance()->query("SELECT * FROM `tablero`");*/
					
					$consulta = "SELECT * FROM `tablero`";
					$resultado = $conn->query($consulta);
					
					$fila = $resultado->fetch_array();				
					if($fila[1] == 'Inactivo')
					{
						echo "<img src='vendors/images/login-page-img.png'>";
					}
					else
					{
						echo "<div id='carouselExampleControls' class='carousel slide pointer-event' data-interval= data-ride='carousel'>"; 
						echo "<div class='carousel-inner'>"; 
							
						echo "<div class='carousel-item active'>"; 
						include_once('graficas/dias.php');
						include_once('graficas/grafica-consumoGN.php');
						include_once('graficas/grafica-consumoEnergiaElectrica.php');
						include_once('graficas/grafica-desperdicioEsmaltes.php');
						include_once('graficas/grafica-calidad.php');
						include_once('graficas/grafica-desperdicio.php');
						include_once('graficas/grafica-tiempoVacioH.php');
						include_once('graficas/grafica-volumenP.php');
						echo "</div>"; 
							
						echo "</div>"; 
						
						echo "</div>"; 
					}
					?>
					
					
					
					
					
				</div>
			</div>
		</div>
	</div>
	
<br><br>
<?php
include_once('repositorios/piePagina.php')
?>
</body>
</html>
