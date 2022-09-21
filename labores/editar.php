<?php include ('vistas3/cabecera.php'); ?>

<?php
    if(!isset($_GET['idlabor'])){
        header('Location: labores.php?mensaje=error');
        exit();
    }

    include_once ('../model/conexion.php');
    $idlabor = $_GET['idlabor'];

    $sentencia = $bd->prepare("select * from labores where idlabor = ?;");
    $sentencia->execute([$idlabor]);
    $labores = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editar.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo labor: </label>
                        <input type="text" class="form-control" name="txtcodigolabor" required 
                        value="<?php echo $labores->codigolabor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtnombre" autofocus required
                        value="<?php echo $labores->nombre; ?>">
                  
                    <div class="d-grid">
                        <input type="hidden" name="idlabor " value="<?php echo $labores->idlabor ; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ('vistas3/pie.php'); ?>