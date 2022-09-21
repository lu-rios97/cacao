<?php 
    if(!isset($_GET['idcultivo'])){
        header('Location:cultivo.php?mensaje=error');
        exit();
    }

    include ('../model/conexion.php');
    $idcultivo = $_GET['idcultivo'];

    $sentencia = $bd->prepare("DELETE FROM cultivos where idcultivo = ?;");
    $resultado = $sentencia->execute([$idcultivo]);

    if ($resultado === TRUE) {
        header('Location:cultivo.php?mensaje=eliminado');
    } else {
        header('Location:cultivo.php?mensaje=error');
    }
    
?>