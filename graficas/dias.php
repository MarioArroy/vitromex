<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php
include_once("conexion.php");

	echo "<div class='modal-dialog modal-lg modal-dialog-centered'>";
	echo "<div class='modal-content'>";
	echo "<div class='modal-header'>";
	echo "<h4 class='modal-title' id='myLargeModalLabel'><i class='icon-copy dw dw-warning'></i> Días sin accidentes</h4>";
	echo "</div>";
	echo "<div class='modal-body text-center'>";
		/*$quer = Connection::getInstance()->query("SELECT * FROM `diassina`");*/
	
		$consulta = "SELECT * FROM `diassina`";
		$resultado = $conn->query($consulta);
					
		$fila1 = $resultado->fetch_array();
	
		
		
	echo "<p style='font-size: 30px'>".$fila1[0]."<br>
		Días sin accidentes</p><br>";

		/*$quer1 = Connection::getInstance()->query("SELECT * FROM `diassa` ORDER BY fecha DESC");*/
		$consulta = "SELECT * FROM `diassa` ORDER BY fecha DESC";
		$resultado2 = $conn->query($consulta);
	
		$fila11 = $resultado2->fetch_array();	
		
	echo "<p style='font-size: 30px'>Último Record<br> ".$fila11[1]." días</p><br>";

	echo "</div>";
	echo "</div>";
	echo "</div>";
?>
</body>
</html>