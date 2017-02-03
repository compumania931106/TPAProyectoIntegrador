<?php

include("../../controller/conexiondb.php");

$periodo = $_POST["periodo"];
$idmaestro = $_POST["idmaestro"];
$idcarrera = $_POST["idcarrera"];
$horasPracticas = $_POST["horasPracticas"];
$horasTeoricas = $_POST["horasTeoricas"];
$caracterizacionAsignatura = $_POST["caracterizacionAsignatura"];
$intencionDidactica = $_POST["intencionDidactica"];
$competenciaAsignatura= $_POST["competenciaAsignatura"];
$bibliografia = $_POST["bibliografia"];
$iddosi = $_POST["iddosi"];

$jsondata = array();
$respuesta = 1;

$sql = "UPDATE dosificacion SET periodo='".$periodo."',idmaestro=".$idmaestro.",idcarrera=".$idcarrera.",horasPracticas=".$horasPracticas.",horasTeoricas=".$horasTeoricas.",caracterizacionAsignatura='".$caracterizacionAsignatura."',intencionDidactica='".$intencionDidactica."',competenciaAsignatura='".$competenciaAsignatura."',bibliografia ='". $bibliografia."' WHERE iddosificacion = ". $iddosi;

mysqli_query($database,$sql) or $respuesta = 0;

if($respuesta == 1){
    $jsondata["code"] = 200;
    $jsondata["msg"] = "Registro actualizado correctamente";
    $jsondata["details"] = "OK";
}else{
    $jsondata["code"] = 500;
    $jsondata["msg"] = $database->error;
    $jsondata["details"] = "OK";
}

header('Content-type: application/json; charset=utf-8');
header("Cache-Control: no-store");
echo json_encode($jsondata, JSON_FORCE_OBJECT);
$database->close();
exit();
?>
