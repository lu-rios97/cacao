<?php
    print_r($_POST);
    if(!isset($_POST['id_permiso'])){
        header('Location:permisos.php?mensaje=error');
    }

    include ('../model/conexion.php');
    $id_permiso  = $_POST['id_permiso '];
    $codigo_permiso = $_POST['txtcodigo_permiso'];
    $permiso = $_POST['txtpermiso'];
    $descripcion = $_POST['txtdescripcion'];

    $sentencia = $bd->prepare("UPDATE permisos SET codigo_permiso = ?, permiso = ?, descripcion = ? where id_permiso = ?;");
    $resultado = $sentencia->execute([$codigo_permiso, $permiso, $descripcion, $id_permiso]);

    if ($resultado === TRUE) {
        header('Location:permisos.php?mensaje=editado');
    } else {
        header('Location:permisos.php?mensaje=error');
        exit();
    }
    
?>