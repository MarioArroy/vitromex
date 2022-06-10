<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include_once('repositorios/scripts.php')
?>
<title>Vitromex | Login</title>
</head>
<!----------------------------------ENCABEZADO PAGINA VISTANTE ---------------------------->
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
					<li><a href="index.php" style="color:#000000">Regresar</a></li>
				</ul>
			</div>
		</div>
	</div>
<!----------------------------------ENCABEZADO PAGINA VISTANTE ---------------------------->
	
	


<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7">
				<img src="vendors/images/login-page-img.png" alt="">
			</div>
			
<!----------------------------------C	A	R	D ---------------------------->
			<div class="col-md-6 col-lg-5">				
				<div class="login-box bg-white box-shadow border-radius-10">
					
					
					<div class="login-title">
						<h2 class="text-center" style="color:#000000">Bienvenido</h2>
					</div>
					
					
					<form action="metodos.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="opcion" value="iniciarSesion">
						
						<div class="input-group custom">
							<input type="text" class="form-control form-control-lg" name="correo" placeholder="Usuario">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
							</div>
						</div>
						
						
						<div class="input-group custom">
							<input type="password" class="form-control form-control-lg" name="contrasena" placeholder="Contraseña">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
							</div>
						</div>
																		
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
								    <input type="submit" class="btn btn-lg btn-block text-white" style="background-color:#1D1C1C" value="Continuar" name="entrar">
								</div>
								
							</div>
						</div>
					</form>
					
					
				</div>
			</div>
<!----------------------------------C	A	R	D ---------------------------->
			
		</div>
		<br><br>
<?php
include_once('repositorios/piePagina.php')
?>
</body>
</html>