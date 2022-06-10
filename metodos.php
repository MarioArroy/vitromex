<?php

include_once("conexion.php");

$opcion = $_REQUEST['opcion'];

switch ($opcion)
{
	case "iniciarSesion":
		session_start();
		$usuario = $_REQUEST['correo'];
		$contra = $_REQUEST['contrasena'];
		
		/*$quer = Connection::getInstance()->query("CALL consultaForm('$usuario', '$contra', @res)");*/
		
		$consulta = "CALL consultaForm('$usuario', '$contra', @res)";
		$resultado = $conn->query($consulta);		
		
		
		
		if ($fila=mysqli_fetch_array(/*$quer*/ $resultado)){
			$_SESSION['usuario']=$fila[2];
			$_SESSION['correo']=$fila[0];
			if ($_SESSION['usuario']=='Administrador') 
			{			 		
			header('Location:admin-index.php');
			}
			else{

				header('Location:superv-index.php');
			}
		}
		else{
			echo "<script>alert('Datos incorrectos');window.location='login.php'</script>";
		}
	break;
		
	case "agregarAccidente":
		$nombreT = $_REQUEST['nombreT'];
		$descripcionA = $_REQUEST['descripcionAT'];
		$turnoT = $_REQUEST['turnoT'];
		$areaT = $_REQUEST['areaT'];		
		$supervisorT = $_REQUEST['supervisorT'];
		
		$agregarAccidente = "CALL agregarAccidente('$nombreT', '$descripcionA', '$turnoT', '$areaT', $supervisorT, @res);";
		
		$resultadoAA = $conn->query($agregarAccidente);
			if($resultadoAA)
			{
				header('Location:admin-accidentes_consultaAccidente.php');
			}
	break;
		
	case "agregarAccidenteS":
		$nombreT = $_REQUEST['nombreT'];
		$descripcionA = $_REQUEST['descripcionAT'];
		$turnoT = $_REQUEST['turnoT'];
		$areaT = $_REQUEST['areaT'];		
		$supervisorT = $_REQUEST['supervisorT'];
		
		$agregarAccidente = "CALL agregarAccidente('$nombreT', '$descripcionA', '$turnoT', '$areaT', $supervisorT, @res);";
		
		$resultadoAA = $conn->query($agregarAccidente);
			if($resultadoAA)
			{
				header('Location:superv-accidentes_nuevoAccidente.php');
			}
	break;
		
	case "actualizarAccidente":
		$nombreTA = $_REQUEST['nombreTA'];
		$descripcionAA = $_REQUEST['descripcionATA'];
		$fechaA = $_REQUEST['fechaAA'];
		
		$actualizarAccidente = "CALL actualizarAccidente('$nombreTA', '$descripcionAA', '$fechaA', @res);";
		
		$resultadoAcA = $conn->query($actualizarAccidente);
			if($resultadoAcA)
			{
				header('Location:admin-accidentes_consultaAccidente.php');
			}
	break;
		
	case "nuevaArea":
		$nombre = $_REQUEST['nombre'];
		$estatusA = $_REQUEST['estatus'];
		
		$agregarArea = "CALL agregarArea('$nombre', '$estatusA', @res)";
		$resultadoA = $conn->query($agregarArea);
			if($resultadoA)
			{
				header('Location:admin-area_consultaAreas.php');
			}			
	break;
		
	case "actualizarArea":
		$nombreA = $_REQUEST['nombreAA'];
		$estatusAc = $_REQUEST['estatusA'];
		
		$actualizarArea = "CALL actualizarArea('$nombreA', '$estatusAc', @res)";
		$resultadoAA = $conn->query($actualizarArea);
			if($resultadoAA)
			{
				header('Location:admin-area_consultaAreas.php');
			}			
	break;
		
	case "objetivosEnergeticosM":
		$fechaEM = $_REQUEST['fechaEM'];
		$consumoEEM = $_REQUEST['consumoEEM'];
		$desperdicioEM = $_REQUEST['desperdicioEM'];
		$consumoGNM = $_REQUEST['consumoGNM'];
		
		$agregarObjetivosEM = "call agregarOE ('$fechaEM', $consumoEEM, $desperdicioEM, $consumoGNM, @res);";
		
		$resultadoAOE = $conn->query($agregarObjetivosEM);
			if($resultadoAOE)
			{
				header('Location:admin-objetivosEnergeticos_nuevoObjetivo.php');
			}		
	break;
		
	case "objetivosEnergeticosF":
		$fechaEF = $_REQUEST['fechaEF'];
		$consumoEEF = $_REQUEST['consumoEEF'];
		$desperdicioEF = $_REQUEST['desperdicioEF'];
		$consumoGNF = $_REQUEST['consumoGNF'];
		
		$agregarObjetivosEF = "call agregarOEF('$fechaEF', $consumoEEF, $desperdicioEF, $consumoGNF, @res);";
		
		$resultadoAOEF = $conn->query($agregarObjetivosEF);
			if($resultadoAOEF)
			{
				header('Location:admin-objetivosEnergeticos_nuevoObjetivo.php');
			}		
	break;
		
	case "objetivosProduccionM":
		$fechaVP = $_REQUEST['fechaVP'];
		$volumenPM = $_REQUEST['volumenPM'];
		$desperdicioPM = $_REQUEST['desperdicioPM'];
		$calidadPM = $_REQUEST['calidadPM'];
		$tiempoVHPM = $_REQUEST['tiempoVHPM'];
		
		$agregarObjetivosPM = "call agregarOP('$fechaVP', $volumenPM, $desperdicioPM, $calidadPM, $tiempoVHPM, @res);";
		
		$resultadoAOP = $conn->query($agregarObjetivosPM);
			if($resultadoAOP)
			{
				header('Location:admin-objetivosProduccion_nuevosObjetivos.php');
			}
	break;
		
	case "objetivosProduccionF":
		$fechaVPF = $_REQUEST['fechaVPF'];
		$volumenPF = $_REQUEST['volumenPF'];
		$desperdicioPF = $_REQUEST['desperdicioPF'];
		$calidadPF = $_REQUEST['calidadPF'];
		$tiempoVHPF = $_REQUEST['tiempoVHPF'];
		
		$agregarObjetivosPF = "call agregarOPF('$fechaVPF', $volumenPF, $desperdicioPF, $calidadPF, $tiempoVHPF, @res);";
		
		$resultadoAOPF = $conn->query($agregarObjetivosPF);
			if($resultadoAOPF)
			{
				header('Location:admin-objetivosProduccion_nuevosObjetivos.php');
			}		
	break;
		
	case "tablerosSegundos":
		$tiempo = $_REQUEST['tiempo'];
		
		$agregarTiempo = "UPDATE `tablero` SET `tiempo` = $tiempo";
		$resultadoTS = $conn->query($agregarTiempo);
			if($resultadoTS)
			{
				header('Location:admin-tableros_tiempo.php');
			}
	break;
		
	case "tablerosEstatus":
		$estatusT = $_REQUEST['estatusT'];		
		$agregarEstatus = "UPDATE `tablero` SET `estatus` = '$estatusT'";
		
		$resultadoTE = $conn->query($agregarEstatus);
		/*$quer = Connection::getInstance()->query($agregarEstatus);*/
		
			if($resultadoTE)
			{
				header('Location:admin-tableros_tiempo.php');
			}		
	break;
		
	case "agregarSup":
		$clave = $_REQUEST['clave'];
		$nombreS = $_REQUEST['nombre'];		
		$areaS = $_REQUEST['area'];
		$turnoS = $_REQUEST['turno'];
		$estatusS = $_REQUEST['estatusS'];
		$email = $_REQUEST['emailS'];
		$contrasena = $_REQUEST['contrasenaS'];
		
		$agregarSupervisor = "CALL agregarSupervisor ($clave ,'$nombreS', '$turnoS', '$estatusS', '$email', '$contrasena', '$areaS', @res)";
		
		$resultadoAS = $conn->query($agregarSupervisor);
			if($resultadoAS)
			{
				header('Location:admin-usuarios_consultarUsuario.php');
			}
	break;
		
	case "actualizarSupervisor":
		$correoS = $_REQUEST['correoS'];
		$contrasenaS = $_REQUEST['contrasenaS'];
		
		$actualizarSupervisor = "CALL actualizarSupervisor('$correoS', '$contrasenaS', @res)";
		
		$resultadoAcSp = $conn->query($actualizarSupervisor);
			if($resultadoAcSp)
			{
				header('Location:admin-usuarios_consultarUsuario.php');
			}
	break;
		
	case "actualizarSupervisorS":
		$correoS = $_REQUEST['correoS'];
		$contrasenaS = $_REQUEST['contrasenaS'];
		
		$actualizarSupervisor = "CALL actualizarSupervisor('$correoS', '$contrasenaS', @res)";
		
		$resultadoAcSp = $conn->query($actualizarSupervisor);
			if($resultadoAcSp)
			{
				header('Location:superv-perfil.php');
			}
	break;
		
		
	case "agregarAdmin":
		$nombreAd = $_REQUEST['nombreAd'];
		$correoAd = $_REQUEST['correoAd'];
		$contrasenaAd = $_REQUEST['contrasenaAd'];
		
		$agregarAdministrador = "CALL agregarAdministrador('$nombreAd', '$correoAd', '$contrasenaAd', @res)";
		
		$resultadoAAd = $conn->query($agregarAdministrador);
			if($resultadoAAd)
			{
				header('Location:admin-usuarios_consultarUsuario.php');
			}
		else{
			echo "<script>alert('El E-mail registrado ya existe, intenta con otro.');window.location='admin-usuarios_nuevoUsuario.php'</script>";
		}
	break;
			
	case "actualizarAdministrador":
		$correoAD = $_REQUEST['correoAD'];
		$contrasenaAD = $_REQUEST['contrasenaAD'];
		
		$actualizarAdministrador = "CALL actualizarAdministrador('$correoAD', '$contrasenaAD', @res);";
		
		$resultadoAcAd = $conn->query($actualizarAdministrador);
			if($resultadoAcAd)
			{
				header('Location:admin-perfil.php');
			}
	break;
		
	case "actualizarCalidad":
		$primera = $_REQUEST['primera'];
		$segunda = $_REQUEST['segunda'];
		$id = $_REQUEST['id'];
		
		$actualizarCalidad = "CALL actualizarCalidad($primera, $segunda, $id, @res);";
		
		$resultadoACVC = $conn->query($actualizarCalidad);
			if($resultadoACVC)
			{
				header('Location:superv-calidad_consultaVolumenCalidad.php');
			}
	break;
		
	case "agregarCalidad":
		$primera = $_REQUEST['primeraA'];
		$segunda = $_REQUEST['segundaA'];
		$id = $_REQUEST['id'];
		
		$agregarCalidad = "CALL agregarCalidad($primera, $segunda, $id, @res);";
		
		$resultadoAVC = $conn->query($agregarCalidad);
			if($resultadoAVC)
			{
				header('Location:superv-calidad_consultaVolumenCalidad.php');
			}
	break;
}

?>