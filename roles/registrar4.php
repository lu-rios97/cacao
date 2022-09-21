<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtcodigorol"]) || empty($_POST["txtnombre"]) ){
        header('Location: roles.php?mensaje=falta');
        exit();
    }

    include_once ('../model/conexion.php');
    $codigorol = $_POST["txtcodigorol"];
    $nombre = $_POST["txtnombre"];
   
    $sentencia = $bd->prepare("INSERT INTO roles(codigorol,nombre) VALUES (?,?);");
    $resultado = $sentencia->execute([$codigorol,$nombre]);

    if ($resultado === TRUE) {
        header('Location: roles.php?mensaje=registrado');
    } else {
        header('Location: roles.php?mensaje=error');
        exit();
    }
    
?>