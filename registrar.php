<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtEdad"]) || empty($_POST["txtSigno"]) || empty($_POST["txtRol"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once ('model/conexion.php');
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $signo = $_POST["txtSigno"];
    $rol= $_POST["txtRol"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(usuario,correo,contraseña,rol) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$edad,$signo,$rol]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>