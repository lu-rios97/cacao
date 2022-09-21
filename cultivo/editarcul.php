<?php
    print_r($_POST);
    if(!isset($_POST['idcultivo'])){
        header('Location: cultivo.php?mensaje=error');
    }

    include ('../model/conexion.php');
    $idcultivo = $_POST['idcultivo'];
    $referencia = $_POST['txtReferencia'];
    $nombre = $_POST['txtNombre'];
    $signo = $_POST['txtSigno'];
    $a = $_POST['txta'];
    $rol = $_POST['txtRol'];

    $sentencia = $bd->prepare("UPDATE cultivos SET referencia = ?, nombre = ?, fecha_registro = ?, descripcion = ?, labores_idlabor = ? where idcultivo = ?;");
    $resultado = $sentencia->execute([$referencia, $nombre, $signo, $a, $rol, $idcultivo]);

    if ($resultado === TRUE) {
        header('Location: cultivo.php?mensaje=editado');
    } else {
        header('Location: cultivo.php?mensaje=error');
        exit();
    }
    
?>