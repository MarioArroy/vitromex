<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'consultarAccidente'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Consulta de accidentes</title>
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
				<h5>Consulta de Accidentes</h5>
			</div>
		</div>
		

	<hr>

<!--------------------------------------------------------- L	I	N	E	A	/	T	I	E	M	P	O----------------------------------------------->
		<div class="timeline mb-30">
			<?php
				$consulta = "SELECT * FROM `accidentes` ORDER BY fechaR DESC";
						$resultado = $conn->query($consulta);
							if($resultado)
							{
								echo "<ul>";
								while($fila = $resultado->fetch_array())
									{
										echo "<li>";
										echo "<div class='timeline-date'>";
										echo "$fila[5]";
										echo "</div>";

										echo "<div class='timeline-desc card-box'>";
										echo "<div class='pd-20'>";
										echo "<h4 class='mb-10 h4'>$fila[0]</h4>";
										echo "<p>".$fila[1]."</p>";
										echo "<button class='btn btn-dark'><a href='admin-accidentes_editarAccidente.php?fecha=$fila[4]' class='text-white'>Editar</a></button>";

										echo "<br> <br><footer class='blockquote-footer'>";
										echo "Última Actualización: $fila[3]</h4><br>";
										echo "Turno: $fila[2] | Área: $fila[6]</h4>";
										echo "</footer>";

										echo "</div>";
										echo "</div>";
										echo "</li>";


									}
								echo "</ul>";
							}
			?>
		</div>
<!--------------------------------------------------------- L	I	N	E	A	/	T	I	E	M	P	O----------------------------------------------->
	
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