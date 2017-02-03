<?php
	include("../../controller/conexiondb.php");


    $nombre = $_POST["nombre"];
    $numero = $_POST["numero"];
    $horasTeoricas = $_POST["horasTeoricas"];
    $horasPracticas = $_POST["horasPracticas"];
    $descripcion = $_POST["descripcion"];
    $temas = $_POST["temas"];
    $actividadesAprendizaje = $_POST["actividadesAprendizaje"];
    $actividadesEnsenanza = $_POST["actividadesEnsenanza"];
    $desarrolloCompEsp = $_POST["desarrolloCompEsp"];
    $observaciones = $_POST["observaciones"];
    $acciones = $_POST["acciones"];
		$idcomp = $_POST["idcomp"];



    $jsondata = array();
	$respuesta = 1;

	$sql = "UPDATE competenciaEspecifica SET nombre='".$nombre."',numero=".$numero.",horasTeoricas=".$horasTeoricas.",horasPracticas=".$horasPracticas.",descripcion='".$descripcion."',temas='".$temas."',actividadesAprendizaje='".$actividadesAprendizaje."',actividadesEnsenanza='".$actividadesEnsenanza."',desarrolloCompEsp='".$desarrolloCompEsp."', observaciones='". $observaciones."', acciones='".$acciones."' WHERE idcompetencia=".$idcomp;

	mysqli_query($database,$sql) or $respuesta = 0;

	if($respuesta == 1){
		$jsondata["code"] = 200;
		$jsondata["msg"] = "Registro actualizado correctamente";
		$jsondata["details"] = "OK";
	}else{
		$jsondata["code"] = 500;
		$jsondata["msg"] = $database->error.$sql;
		$jsondata["details"] = "OK";
	}

	header('Content-type: application/json; charset=utf-8');
    header("Cache-Control: no-store");
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    $database->close();
    exit();
?>
