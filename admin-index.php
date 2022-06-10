<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'inicioA'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php')
?>
<title>Vitromex | Gestión</title>
</head>
<body>
<?php
include_once('repositorios/encabezado.php');
include_once('repositorios/menuA.php');

?>
<div class="main-container">
<div class="pd-ltr-20"><br><br><br><br><br><br>
	<div class="card-box pd-20 height-100-p mb-30">
		<div class="row align-items-center">
			<div class="col-md-4">
				<img src="vendors/images/banner-img.png" alt="">
			</div>
			<div class="col-md-8">
				<h4 class="font-20 weight-500 mb-10 text-capitalize">
					<?php
						$correo = $_SESSION['correo'];
						$consulta = "SELECT * FROM `administrador` WHERE login_correo = '$correo'";
						$resultado = $conn->query($consulta);
						$fila = $resultado->fetch_array();
					?>
					Bienvenido <div class="weight-600 font-30 text-blue" style="color:#042c64"><?php echo "$fila[1]";?></div>
				</h4><br><br>
					<button class="btn btn-dark" data-toggle="modal" data-target="#modal1">Ver días sin accidentes</button>
			</div>
		</div>
		
		<div class="col-md-4 ">					
			<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel"><i class="icon-copy dw dw-warning"></i> Días sin accidentes</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<div class="modal-body text-center">
							<?php 
							$conD = "SELECT * FROM `diassina`";
							$resul = $conn->query($conD);
							$fila1 = $resul->fetch_array();	
							?>
							<p style="font-size: 30px"><?php echo $fila1[0];?> <br>
							Días sin accidentes</p><br>
							
							<?php 
							$conD1 = "SELECT * FROM `diassa` ORDER BY fecha DESC";
							$resul1 = $conn->query($conD1);
							$fila11 = $resul1->fetch_array();	
							?>
							<p style="font-size: 30px">Último Record<br><?php echo $fila11[1];?> días</p><br>
														
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<a href="admin-index.php" class="btn btn-dark">Aceptar</a>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>

	
	</div>
</div>
<br><br><br><br><br><br>

 <?php
}
else{
  header('Location:login.php');
}
?>

<?php
include_once('repositorios/piePagina.php');
?>
		</div>
	</div>
	
	
</body>
</html>
