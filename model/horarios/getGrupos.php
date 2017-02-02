<?php 
	include("../../controller/conexiondb.php");

	$code = $_GET["materia"];
	$code2 = $_GET["maestro"];
	
	$jsondata = array();
	
	if($result = $database->query("SELECT grupo, idHorario from vclases where smateria = ".$code." and smaestro = ".$code2)){
		if ($result -> num_rows > 0) {
			$jsondata["code"] = 200;
			$jsondata["msg"] = array();
			while($row = $result->fetch_object()){
				$jsondata["msg"][] = $row;
			}
			$jsondata["details"] = "OK";
		}else{
			$jsondata["code"] = 401;
			$jsondata["msg"] = "No tiene acceso al sistema";
			$jsondata["details"] = "OK";
		}

		$result -> close();
	}else{
		echo "Error en la consulta";
	}

	header('Content-type: application/json; charset=utf-8');
    header("Cache-Control: no-store");
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    $database->close();
    exit();
?>