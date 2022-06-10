<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pruebasv";
	$seg = 0;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT segundos FROM configuraciontiempo";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		//echo "segundos " . $row["segundos"];
		  $seg = $row["segundos"];
	  }
	} else {
	  echo "0 results";
	}

	$calidad = "SELECT * FROM calidad2 ";
	$resultado = $conn->query($calidad);
		
	$res = "";
	if ($resultado->num_rows > 0) {
	  // output data of each row
	  while($row = $resultado->fetch_assoc()) {
		  $res .= "['".$row['mes']."', ".$row['calidad']."],";
	  }
	}

	$conn->close();	

	$mes = "Enero";
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gráfica 2</title>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Meta'],
          <?php echo $res; ?>
        ]);

        var options = {
          chart: {
            title: 'Calidad',
            subtitle: 'Descripción alguna de la calidad',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('grafica2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
	
</head>
	
<body>
	<h1>Gráfica 2</h1>
	<div id="grafica2" style="width: 1600px; height: 600px;"></div>
</body>
	<script>
		/* Tiempo de retardo entre tableros */
		//setTimeout("location.href='grafica1.php?seg=<?php echo $seg; ?>'", <?php echo $seg*1000; ?> );
	</script>
</html>
