<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtReferencia"]) || empty($_POST["txtNombre"]) || empty($_POST["txtSigno"]) || empty($_POST["txta"]) || empty($_POST["txtRol"])){
        header('Location: cultivo.php?mensaje=falta');
        exit();
    }

    include_once ('../model/conexion.php');
    $referencia = $_POST["txtReferencia"];
    $nombre = $_POST["txtNombre"];
    $fecha_registro = $_POST["txtSigno"];
    $descripcion = $_POST["txta"];
    $lobores_idlabor = $_POST["txtRol"];

    $sentencia = $bd->prepare("INSERT INTO cultivos(referencia,nombre,fecha_registro,descripcion,labores_idlabor) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$referencia,$nombre,$fecha_registro,$descripcion,$lobores_idlabor]);

    if ($resultado === TRUE) {
        header('Location: cultivo.php?mensaje=registrado');
    } else {
        header('Location: cultivo.php?mensaje=error');
        exit();
    }
    
?>