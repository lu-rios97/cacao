<?php include ('vistas2/cabecera.php'); ?>

<?php
    if(!isset($_GET['idcultivo'])){
        header('Location: cultivo.php?mensaje=error');
        exit();
    }

    include_once ('../model/conexion.php');
    $idcultivo = $_GET['idcultivo'];

    $sentencia = $bd->prepare("select * from cultivos where idcultivo = ?;");
    $sentencia->execute([$idcultivo]);
    $cultivos = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarcul.php">
                    <div class="mb-3">
                        <label class="form-label">Referencia: </label>
                        <input type="text" class="form-control" name="txtReferencia" required 
                        value="<?php echo $cultivos->referencia; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required
                        value="<?php echo $cultivos->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha Registro: </label>
                        <input type="date" class="form-control" name="txtSigno" autofocus required
                        value="<?php echo $cultivos->fecha_registro; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripcion: </label>
                        <input type="text" class="form-control" name="txta" autofocus required
                        value="<?php echo $cultivos->descripcion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Labores: </label>
                        <input type="text" class="form-control" name="txtRol" autofocus required 
                        value="<?php echo $cultivos->labores_idlabor; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idcultivo" value="<?php echo $cultivos->idcultivo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ('vistas2/pie.php'); ?>