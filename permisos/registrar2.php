<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtcodigo_permiso"]) || empty($_POST["txtpermiso"]) || empty($_POST["txtdescripcion"])){
        header('Location: permisos.php?mensaje=falta');
        exit();
    }

    include_once ('../model/conexion.php');
    $codigo_permiso = $_POST["txtcodigo_permiso"];
    $permiso = $_POST["txtpermiso"];
    $descripcion = $_POST["txtdescripcion"];
   
    $sentencia = $bd->prepare("INSERT INTO permisos(codigo_permiso,permiso,descripcion) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$codigo_permiso,$permiso,$descripcion]);

    if ($resultado === TRUE) {
        header('Location: permisos.php?mensaje=registrado');
    } else {
        header('Location: permisos.php?mensaje=error');
        exit();
    }
    
?>