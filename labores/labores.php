<?php include ("vistas3/cabecera.php"); ?>

<?php
    include_once "../model/conexion.php";
    $sentencia = $bd -> query("select * from labores");
    $labores = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Labores
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Codigo labor</th>
                                <th scope="col">nombre</th>
                                <!-- <th scope="col">contrase??a</th>
                                <th scope="col">Rol</th> -->
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($labores as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->idlabor ; ?></td>
                                <td><?php echo $dato->codigolabor; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <?php /* echo $dato->contrase??a */; ?>
                                <td><?php /* echo $dato->rol */; ?>

                                <td><a class="text-success" href="editar.php?idlabor=<?php echo $dato->idlabor; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar3.php?idlabor=<?php echo $dato->idlabor; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar2.php">
                    <div class="mb-3">
                        <label class="form-label">Codigo labor: </label>
                        <input type="text" class="form-control" name="txtcodigolabor" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">nombre: </label>
                        <input type="text" class="form-control" name="txtnombre" autofocus required>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">contrase??a: </label>
                        <input type="password" class="form-control" name="txtSigno" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol: </label>
                        <input type="text" class="form-control" name="txtRol" autofocus required> -->
                        <!-- <select disabledSelect name="" id="">
                            <OPtion disabled selected>SELECCION</OPtion>
                            <option value="ADMISTRADOR">ADMISTRADOR</option>
                            <option value="VENDEDOR">VENDEDOR</option>
                            <option value="COMPRADOR">COMPRADOR</option>
                        </select> -->

                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("vistas3/pie.php"); ?>