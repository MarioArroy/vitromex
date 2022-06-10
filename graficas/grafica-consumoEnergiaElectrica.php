<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "v";
	$seg = 0;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed:" . $conn->connect_error);
	}

	$calidad = "SELECT * FROM consumoenergia where fecha like '%2021%'";
	$resultado = $conn->query($calidad);
	
	$res = "";
	if ($resultado->num_rows > 0) {
	  // output data of each row
	  while($row = $resultado->fetch_assoc()) {
		  $res .= "['".$row['fecha']."', ".$row['meta']." , ".$row['final']."],";
	  }
	}

	$conn->close();	

	$mes = "Enero";
	?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Meta', 'Meta Real'],
          <?php echo $res; ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('grafica2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
	
</head>	
	
<body>
	<h1>Consumo de Energía Eléctrica</h1>
	<div id="grafica2" style="width: 1400px; height: 600px;"></div>
</body>
	<script>
		/* Tiempo de retardo entre tableros */
		
	</script>
</html>
