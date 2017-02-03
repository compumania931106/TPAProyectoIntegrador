<?php
include("../../controller/conexiondb.php");

$idcomp = $_POST["idcomp"];

$jsondata = array();
$respuesta = 1;

$sql = "delete FROM competenciaEspecifica where idcompetencia = ". $idcomp;
mysqli_query($database,$sql) or $respuesta = 0;

if($respuesta == 1){
	$jsondata["code"] = 200;
	$jsondata["msg"] = "Eliminado correctamente";
	$jsondata["details"] = "OK";
}else{
	$jsondata["code"] = 500;
	$jsondata["msg"] = $database->error;
	$jsondata["details"] = "error";
}

header('Content-type: application/json; charset=utf-8');
header("Cache-Control: no-store");
echo json_encode($jsondata, JSON_FORCE_OBJECT);
$database->close();
exit();
?>
