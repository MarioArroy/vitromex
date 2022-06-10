<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'consultarV'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Volúmen de Calidad</title>
</head>

<body>

<?php
include_once('repositorios/encabezadoS.php');
include_once('repositorios/menuS.php');	
?>
	
<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<h5>Registra nuevo Volumen de Cálidad</h5>
			</div>
		</div>
		<br><br>
		
		<div class="row">
			
			<?php
			$correo = $_SESSION['correo'];
			$consulta = "SELECT * FROM `supervisor` WHERE login_correo = '$correo'";
			$resultado = $conn->query($consulta);
				if($resultado)
				{
					while($fila = $resultado->fetch_array())
					{
						if($fila[2]=='Matutino')
						{
					/***************************************** H	A	B	I	L	I	T	A	D	O	**************************************/
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
							echo "<h5>Volumen de Cálidad | Matutino</h5><br>";
														
							echo "<form action='metodos.php' method='post' enctype='multipart/form-data'>";
							echo "<input type='hidden' name='opcion' value='agregarCalidad'>";
							
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='number' class='form-control' name='primeraA' min='0' max='9999' required
							data-toggle='tooltip' data-placement='top' title='Recuerda usar valores entre 0 y 9999' >";
							echo "</div>";

							echo "<div class='form-group'>";					
							echo "<label>Segunda</label>";
							echo "<input type='number' class='form-control' name='segundaA' min='0' max='9999' required
							data-toggle='tooltip' data-placement='top' title='Recuerda usar valores entre 0 y 9999' >";
							echo "</div>";
							
							echo "<input type='submit' class='btn btn-dark' value='Guardar'> &nbsp;";
							$id = $fila[0];
							echo "<input type='reset' class='btn btn-secondary' value='Limpiar'> &nbsp; <input type='text' name='id' value='$id' class='col-2'>";
							
							echo "</form>";
							echo "</div>";
							echo "</div>";
							
						/***************************************** I	N	A	H	A	B	I	L	I	T	A	D	O	******************************/	
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
							
							echo "<h5>Volumen de Cálidad | Vespertino</h5><br>";
							
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='text' class='form-control' disabled>";
							echo "</div>";

							echo "<div class='form-group'>";					
							echo "<label>Segunda</label>";
							echo "<input type='text' class='form-control' disabled>";
							echo "</div>";
							

							echo "</div>";
							echo "</div>";
							
						/***************************************** I	N	A	H	A	B	I	L	I	T	A	D	O	******************************/	
						
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
								
							echo "<h5>Volumen de Cálidad | Nocturno</h5><br>";
								
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='text' class='form-control' disabled>";
							echo "</div>";

							echo "<div class='form-group'>";				
							echo "<label>Segunda</label>";
							echo "<input type='text' class='form-control' disabled>";
							echo "</div>";
								
							echo "</div>";
							echo "</div>";
						}
						else
						{
							if($fila[2]=='Vespertino')
							{
					/************************************ I N	H	A	B	I	L	I	T	A	D	O	**************************************/
							$calidadS1 = "SELECT (primera/ (primera+segunda)*100) FROM calidad WHERE fecha= date_format(now(), '%Y-%m-%d') and supervisor_idsupervisor = 1";
							$rC1 = $conn->query($calidadS1);
							$c1 = $rC1->fetch_array();
							
								
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
							echo "<h5>Volumen de Cálidad | Matutino</h5><br>";
							
							echo "<p> Volumen logrado | ".$c1[0]."</p><br>";
							
							$consulta3 = "SELECT primera, segunda FROM calidad WHERE supervisor_idsupervisor = 1 and fecha = date_format(now(), '%Y-%m-%d')";
							$resultado3 = $conn->query($consulta3);
							$fila3 = $resultado3->fetch_array();
													
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='text' class='form-control' value=".$fila3[0]." disabled>";
							echo "</div>";

							echo "<div class='form-group'>";					
							echo "<label>Segunda</label>";
							echo "<input type='text' class='form-control' value=".$fila3[1]." disabled>";
							echo "</div>";
							
							echo "</div>";
							echo "</div>";
							
						/***************************************** 	H	A	B	I	L	I	T	A	D	O	******************************/	
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
							echo "<h5>Volumen de Cálidad | Vespertino</h5><br>";
														
							echo "<form action='metodos.php' method='post' enctype='multipart/form-data'>";
							echo "<input type='hidden' name='opcion' value='agregarCalidad'>";
							
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='number' class='form-control' name='primeraA' min='0' max='9999' required
							data-toggle='tooltip' data-placement='top' title='Recuerda usar valores entre 0 y 9999' >";
							echo "</div>";

							echo "<div class='form-group'>";					
							echo "<label>Segunda</label>";
							echo "<input type='number' class='form-control' name='segundaA' min='0' max='9999' required
							data-toggle='tooltip' data-placement='top' title='Recuerda usar valores entre 0 y 9999' >";
							echo "</div>";
							
							echo "<input type='submit' class='btn btn-dark' value='Guardar'> &nbsp;";
							$id = $fila[0];
							echo "<input type='reset' class='btn btn-secondary' value='Limpiar'> &nbsp; <input type='text' name='id' value='$id' class='col-2'>";
							
							echo "</form>";
							
							echo "</div>";
							echo "</div>";
							
						/***************************************** I	N	A	H	A	B	I	L	I	T	A	D	O	******************************/	
						
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
								
							echo "<h5>Volumen de Cálidad | Nocturno</h5><br>";
								
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='text' class='form-control' disabled>";
							echo "</div>";

							echo "<div class='form-group'>";				
							echo "<label>Segunda</label>";
							echo "<input type='text' class='form-control' disabled>";
							echo "</div>";
								
							echo "</div>";
							echo "</div>";
							}
							else
							{
								if($fila[2]=='Nocturno')
							{
					/************************************ I N	H	A	B	I	L	I	T	A	D	O	**************************************/
							$calidadS1N = "SELECT (primera/ (primera+segunda)*100) FROM calidad WHERE fecha= date_format(now(), '%Y-%m-%d') and supervisor_idsupervisor = 1";
							$rC1N = $conn->query($calidadS1N);
							$c1N = $rC1N->fetch_array();
							
								
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
							echo "<h5>Volumen de Cálidad | Matutino</h5><br>";
							
							echo "<p> Volumen logrado | ".$c1N[0]."</p><br>";
							
							$consulta3N = "SELECT primera, segunda FROM calidad WHERE supervisor_idsupervisor = 1 and fecha = date_format(now(), '%Y-%m-%d')";
							$resultado3N = $conn->query($consulta3N);
							$fila3N = $resultado3N->fetch_array();
													
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='text' class='form-control' value=".$fila3N[0]." disabled>";
							echo "</div>";

							echo "<div class='form-group'>";					
							echo "<label>Segunda</label>";
							echo "<input type='text' class='form-control' value=".$fila3N[1]." disabled>";
							echo "</div>";
							
							echo "</div>";
							echo "</div>";
							
												
						/***************************************** I	N	A	H	A	B	I	L	I	T	A	D	O	******************************/	
						
							$calidadS1N2 = "SELECT (primera/ (primera+segunda)*100) FROM calidad WHERE fecha= date_format(now(), '%Y-%m-%d') and supervisor_idsupervisor = 2";
							$rC1N2 = $conn->query($calidadS1N2);
							$c1N2 = $rC1N2->fetch_array();
							
								
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
							echo "<h5>Volumen de Cálidad | Matutino</h5><br>";
							
							echo "<p> Volumen logrado | ".$c1N2[0]."</p><br>";
							
							$consulta3N2 = "SELECT primera, segunda FROM calidad WHERE supervisor_idsupervisor = 2 and fecha = date_format(now(), '%Y-%m-%d')";
							$resultado3N2 = $conn->query($consulta3N2);
							$fila3N2 = $resultado3N2->fetch_array();
													
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='text' class='form-control' value=".$fila3N2[0]." disabled>";
							echo "</div>";

							echo "<div class='form-group'>";					
							echo "<label>Segunda</label>";
							echo "<input type='text' class='form-control' value=".$fila3N2[1]." disabled>";
							echo "</div>";
							
							echo "</div>";
							echo "</div>";
						
						/***************************************** 	H	A	B	I	L	I	T	A	D	O	******************************/	
							echo "<div class='col-md-4'>";
							echo "<div class='card-box height-100-p pd-20'>";
							echo "<h5>Volumen de Cálidad | Nocturno</h5><br>";
														
							echo "<form action='metodos.php' method='post' enctype='multipart/form-data'>";
							echo "<input type='hidden' name='opcion' value='agregarCalidad'>";
							
							echo "<div class='form-group'>";					
							echo "<label>Primera</label>";
							echo "<input type='number' class='form-control' name='primeraA' min='0' max='9999' required
							data-toggle='tooltip' data-placement='top' title='Recuerda usar valores entre 0 y 9999' >";
							echo "</div>";

							echo "<div class='form-group'>";					
							echo "<label>Segunda</label>";
							echo "<input type='number' class='form-control' name='segundaA' min='0' max='9999' required
							data-toggle='tooltip' data-placement='top' title='Recuerda usar valores entre 0 y 9999' >";
							echo "</div>";
							
							echo "<input type='submit' class='btn btn-dark' value='Guardar'> &nbsp;";
							$id = $fila[0];
							echo "<input type='reset' class='btn btn-secondary' value='Limpiar'> &nbsp; <input type='text' name='id' value='$id' class='col-2'>";
							
							echo "</form>";
							echo "</div>";
							echo "</div>";
							}
							}
						}
					}
				}
			
			?>
		</div>	
	</div>
</div>

	<br><br><br>
	
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