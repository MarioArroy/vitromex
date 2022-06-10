
<html>
<head>
<meta charset='utf-8'>
<?php
include_once('repositorios/scripts.php')
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
					<li><a href="graficas.php" style="color:#000000">Gráficas</a></li>
				</ul>
			</div>
			<div>
				<ul>
					<li><a href="login.php" style="color:#000000">Login</a></li>					
				</ul>				
			</div>
		</div>
	</div>
	
	<?php include_once('graficas/grafica2.php') ?>
	
<br><br>
<?php
include_once('repositorios/piePagina.php')
?>
</body>
</html>
