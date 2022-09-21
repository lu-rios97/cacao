<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from persona where codigo = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Usuario: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $persona->usuario; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo: </label>
                        <input type="email" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $persona->correo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña: </label>
                        <input type="password" class="form-control" name="txtSigno" autofocus required
                        value="<?php /* echo $persona->contraseña; */ ?>">
                        
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol<a href=""></a>: </label>
                        <input type="text" class="form-control" name="txtRol" autofocus required
                        value="<?php echo $persona->rol; ?>">
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">: </label>
                        <input type="password" class="form-control" name="txtSigno" autofocus required>
                    </div> -->
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>