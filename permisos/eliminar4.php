<?php 
    if(!isset($_GET['id_permiso'])){
        header('Location: permisos.php?mensaje=error');
        exit();
    }

    include ('../model/conexion.php');
    $id_permiso = $_GET['id_permiso '];

    $sentencia = $bd->prepare("DELETE FROM permisos where id_permiso = ?;");
    $resultado = $sentencia->execute([$id_permiso ]);

    if ($resultado === TRUE) {
        header('Location: permisos.php?mensaje=eliminado');
    } else {
        header('Location: permisos.php?mensaje=error');
    }
    
?>