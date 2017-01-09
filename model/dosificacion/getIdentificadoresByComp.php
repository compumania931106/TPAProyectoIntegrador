<?php
include("../../controller/conexiondb.php");
$idcomp = $_POST["idcomp"];
$jsondata = array();

if($result = $database->query("SELECT * FROM `indicador` where idcomp = ".$idcomp)){
    if ($result -> num_rows > 0) {
        $jsondata["code"] = 200;
        $jsondata["msg"] = array();
        while($row = $result->fetch_object()){
            $jsondata["msg"][] = $row;
        }
        $jsondata["details"] = "OK";
    }else{
        $jsondata["code"] = 401;
        $jsondata["msg"] = $database->error;
        $jsondata["details"] = "OK";
    }

    $result -> close();
}else{
    $jsondata["code"] = 402;
    $jsondata["msg"] = $database->error;
    $jsondata["details"] = "OK";
}

header('Content-type: application/json; charset=utf-8');
header("Cache-Control: no-store");
echo json_encode($jsondata);
$database->close();
exit();
?>
