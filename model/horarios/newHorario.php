<?php
	include("../../controller/conexiondb.php");

	$NoControl = $_POST["NoControl"];
	$grupo = $_POST["grupo"];

	$jsondata = array();
	$respuesta = 1;
	
	$sql2="INSERT INTO horarios (FK_id_Alumno,FK_id_Clase,statusEncuesta) 
	VALUES ('".$NoControl."','".$grupo."','0')";
	
	mysqli_query($database,$sql2) or $respuesta = 0;

	if($respuesta == 1){
		$jsondata["code"] = 200;
		$jsondata["msg"] = "Registrado correctamente";
		$jsondata["details"] = "OK";
	}else{
		$jsondata["code"] = 500;
		$jsondata["msg"] = "Error en el registro";
		$jsondata["details"] = "OK";
	}

	header('Content-type: application/json; charset=utf-8');
    header("Cache-Control: no-store");
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    $database->close();
    exit();
?>