<?php
	include("../../controller/conexiondb.php");

	$iddosificacion = $_POST["iddosificacion"];
    $idmateria = $_POST["idmateria"];

	$jsondata = array();
	$respuesta = 1;

	$sql = "INSERT INTO dosificacion_materia (iddosificacion,idmateria) VALUES (". $iddosificacion.",'".$idmateria."')";
	mysqli_query($database,$sql) or $respuesta = 0;

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