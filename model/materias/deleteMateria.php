<?php
	include("../../controller/conexiondb.php");

		$materiaid = $_POST["materiaid"];

		$jsondata = array();
		$respuesta = 1;

		$sql = "DELETE FROM materias WHERE materiaid = '". $materiaid ."'";

		mysqli_query($database,$sql) or $respuesta = 0;

		if($respuesta == 1){
		$jsondata["code"] = 200;
		$jsondata["msg"] = "Registro eliminado correctamente";
		$jsondata["details"] = "OK";
	}else{
		$jsondata["code"] = 500;
		$jsondata["msg"] = "Error en la eliminación";
		$jsondata["details"] = "OK";
	}

	header('Content-type: application/json; charset=utf-8');
    header("Cache-Control: no-store");
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    $database->close();
    exit();
?>