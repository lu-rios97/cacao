<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $edad = $_POST['txtEdad'];
    $signo = $_POST['txtSigno'];
    $rol = $_POST['txtRol'];

    $sentencia = $bd->prepare("UPDATE persona SET usuario = ?, correo = ?, contraseña = ?, rol = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre, $edad, $signo,$rol, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>