<?php
    print_r($_POST);
    if(!isset($_POST['idlabor'])){
        header('Location:labores.php?mensaje=error');
    }

    include ('../model/conexion.php');
    $idlabor  = $_POST['idlabor'];
    $codigolabor = $_POST['txtcodigolabor'];
    $nombre = $_POST['txtnombre'];
   

    $sentencia = $bd->prepare("UPDATE labores SET codigolabor = ?, nombre = ? where idlabor = ?;");
    $resultado = $sentencia->execute([$codigolabor, $nombre, $idlabor]);

    if ($resultado === TRUE) {
        header('Location:labores.php?mensaje=editado');
    } else {
        header('Location:labores.php?mensaje=error');
        exit();
    }
    
?>