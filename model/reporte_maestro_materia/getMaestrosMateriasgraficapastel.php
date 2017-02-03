<?php 
	include("../../controller/conexiondb.php");

	$jsondata = array();

	if($result = $database->query("SELECT usuario.usuarioname as name, count(*) as y FROM usuario INNER JOIN clase on usuario.usuarioid = clase.maestro GROUP BY clase.maestro HAVING count(*) > 0 ")){
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
    echo json_encode($jsondata);
    $database->close();
    exit();
?>