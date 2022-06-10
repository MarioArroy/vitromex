<?php

function permitirAcceso($tipo,$formulario){
	include('conexion.php');
	$prueba = "SELECT * FROM `acceso` WHERE `tipoUsuario`='$tipo' AND `interfaz`='$formulario' ";
	$result = $conn-> query($prueba);
	if ($result->num_rows >0)
	return true;
	else
	return false;		
		
	}

?>