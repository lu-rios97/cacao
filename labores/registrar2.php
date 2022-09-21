<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtcodigolabor"]) || empty($_POST["txtnombre"])){
        header('Location: labores.php?mensaje=falta');
        exit();
    }

    include_once ('../model/conexion.php');
    $codigolabor = $_POST["txtcodigolabor"];
    $nombre = $_POST["txtnombre"];

    $sentencia = $bd->prepare("INSERT INTO labores(codigolabor,nombre) VALUES (?,?);");
    $resultado = $sentencia->execute([$codigolabor,$nombre]);

    if ($resultado === TRUE) {
        header('Location: labores.php?mensaje=registrado');
    } else {
        header('Location: labores.php?mensaje=error');
        exit();
    }
    
?>