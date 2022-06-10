<?php
session_start();
include("conexion.php");
include("privilegio.php");
if(permitirAcceso($_SESSION['usuario'], 'nuevoU'))
{ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php');
?>
<title>Vitromex | Nuevo Usuario</title>
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
				<h5>Registra un usuario</h5>
			</div>
		</div>


	<div class="row">
		<div class="col-md-8">
			<div class="card-box height-100-p pd-20">
				<h5>Nuevo Supervisor</h5><hr>
				<form name = "agregarSupervisor" action="metodos.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="agregarSup">
					
					
				<div class="form-group">
					<label>Clave de Trabajor</label>
					<input type="number" class="form-control" id="clave" name="clave" pattern="[0-9]+" min="0" required>
				</div>
					
				<div class="form-group">
					<label>Nombre del trabajor</label>
					<input type="text" class="form-control" id="nombre" name="nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú ]+" required>					
				</div>
				
				<div class="form-group">
					<?php
						$consulta = "SELECT * FROM `area` WHERE `estatus` = 'Activo'";
						$resultado = $conn->query($consulta);
							if($resultado)
							{
								echo "<select class='custom-select col-12' required name='area'>";
								echo "<option selected=''>Elige el Área</option>";
									while($fila = $resultado->fetch_array())
									{										
										echo "<option value='".$fila[0]."'>".$fila[0]." </option>";
									}
								echo "</select>";
							}
					?>	
				</div>
				
				<div class="form-group">
					<select class="custom-select col-12" required name="turno">
						<option selected="">Turno</option>
						<option value="Matutino">Matutino</option>
						<option value="Vespertino">Vespertino</option>
						<option value="Nocturno">Nocturno</option>
					</select>
				</div>
				
				<div class="form-group">
					<select class="custom-select col-12" required name="estatusS">
						<option selected="">Elige el estatus</option>
						<option value="Activo">Activo</option>
						<option value="Inactivo">Inactivo</option>
					</select>
				</div><hr>
					
				<p><b>Datos de Acceso</b></p>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" id="emailS" name="emailS" required>
				</div>

				<div class="form-group">
					<label>Contraseña</label>
					<input type="password" class="form-control" id="contrasenaS" name="contrasenaS"  pattern="[A-Za-z0-9Ññ_/*-]+" minlength="5" maxlength="15"required>
				</div>
				<input type="submit" class="btn btn-dark" value="Guardar">
				<input type="reset" class="btn btn-secondary" value="Limpiar">
				</form><br><br>
					
				
				<div class="form-group">
					<h5>Nuevo Administrador</h5><hr>
				<form action="metodos.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="opcion" value="agregarAdmin">
					
					<label>Nombre del Administrador</label>
					<input type="text" class="form-control" name="nombreAd" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú ]+" required>
				</div>
					
				<div class="form-group">					
					<label>Email</label>
					<input type="email" class="form-control" name="correoAd" required>
				</div>
					
					
				<div class="form-group">					
					<label>Contraseña</label>
					<input type="password" class="form-control" name="contrasenaAd" pattern="[A-Za-z0-9Ññ_/*-]+" minlength="5" maxlength="15"required>	
				</div>
					<input type="submit" class="btn btn-dark" value="Guardar">
					<input type="reset" class="btn btn-secondary" value="Limpiar">
				</form>
			</div>
		</div>			
		
		
		<div class="col-md-4 ">
			<div class="card-box height-100-p pd-20">
				<h2 class="h4 mb-20">Recuerda<br>¡ Solicita el email al trabajador !</h2><br><br><br><br>
				<img src="vendors/images/registro.jpg" alt="">
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