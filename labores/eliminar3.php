<?php 
    if(!isset($_GET['idlabor'])){
        header('Location: labores.php?mensaje=error');
        exit();
    }

    include ('../model/conexion.php');
    $idlabor = $_GET['idlabor'];

    $sentencia = $bd->prepare("DELETE FROM labores where idlabor = ?;");
    $resultado = $sentencia->execute([$idlabor]);

    if ($resultado === TRUE) {
        header('Location: labores.php?mensaje=eliminado');
    } else {
        header('Location: labores.php?mensaje=error');
    }
    
?>