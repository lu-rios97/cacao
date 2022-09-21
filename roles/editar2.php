<?php include ('vistas4/cabecera.php'); ?>

<?php
    if(!isset($_GET['idrol'])){
        header('Location: roles.php?mensaje=error');
        exit();
    }

    include_once ('../model/conexion.php');
    $id_permiso  = $_GET['idrol'];

    $sentencia = $bd->prepare("select * from roles where idrol = ?;");
    $sentencia->execute([$idrol]);
    $roles = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarrol.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo rol: </label>
                        <input type="text" class="form-control" name="txtcodigorol" required 
                        value="<?php echo $roles->codigorol; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtnombre" autofocus required
                        value="<?php echo $roles->nombre; ?>">
                    </div>
                    
                    <div class="d-grid">
                        <input type="hidden" name="idrol" value="<?php echo $permisos->idrol; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ('vistas4/pie.php'); ?>