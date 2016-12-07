<?php 
session_start();
if(isset($_SESSION["username"])){
    header("location: cpanel.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <script type="text/javascript" src="js/plugins/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.validate.min.js"></script>

    <script type="text/javascript" src="js/plugins/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/plugins/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.growl.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/plugins/bootbox.min.js"></script>


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.growl.css">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">

    <title>ITTepic - Gestión de Calidad</title>
</head>
<body >
	<form id="frmLogin" class="logcss">
		<h2>Inicio de Sesión</h2>
        <div class="form-group">
            <label class="control-label" for="username">Usuario:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <input class="form-control" type="text" id="username" name="username" placeholder="Ingrese su nombre de usuario.">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label" for="password">Contraseña:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <input class="form-control" type="password" id="password" name="password" placeholder="Ingrese su contraseña.">
            </div>
        </div>
        
        <div>
            <button type="submit" class="btn btn-block btn-primary btn-lg"><i class="glyphicon glyphicon-save"></i>Entrar</button>
        </div>
    </form>
</body>
</html>