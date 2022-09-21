<?php include ('vistas4/cabecera.php'); ?>

<?php
    if(!isset($_GET['id_permiso'])){
        header('Location: permisos.php?mensaje=error');
        exit();
    }

    include_once ('../model/conexion.php');
    $id_permiso  = $_GET['id_permiso'];

    $sentencia = $bd->prepare("select * from permisos where id_permiso = ?;");
    $sentencia->execute([$id_permiso]);
    $permisos = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarlabo.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo Permiso: </label>
                        <input type="text" class="form-control" name="txtcodigo_permiso" required 
                        value="<?php echo $permisos->codigo_permiso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Permiso: </label>
                        <input type="text" class="form-control" name="txtpermisos" autofocus required
                        value="<?php echo $permisos->permiso; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txtdescripcion" autofocus required
                        value="<?php echo $permisos->descripcion; ?>">
                    </div>
                  
                    
                    <div class="d-grid">
                        <input type="hidden" name="id_permiso" value="<?php echo $permisos->id_permiso; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ('vistas4/pie.php'); ?>