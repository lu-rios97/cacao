<?php 
session_start();

if($_POST){
    if(($_POST['usuario']=="admin")&&($_POST['clave']=="admin")){
        $_SESSION['usuario']="ok";
        $_SESSION['nomUsuario']="admin";
    
    header('Location:inicioadmin.php');
    }else{
        $mensaje="Error: Datos Incorrecto";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
      
  

        <div class="container">
            <div class="row">
            
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <br>
                    <br>

                <div class="card">
                    <div class="card-header">
                        Inisio de sesion
                    </div>
                    <div class="card-body">
                        

                    <form action="" method="post">
                        Usuario: <input class="form-control" type="text" name="usuario" id="">
                        <br>
                        Contraseña: <input class="form-control" type="text" name="contraseña" id="">
                        <br>

                        <button class="btn btn-success" type="submit">entrar</button>
                    </form>

                    </div>
                    <div class="card-footer text-muted">
                        
                    </div>
                </div>

               


                    
                </div>
                <div class="col-md-4">
                    
                </div>

            </div>
            
        </div>

        

  </body>
</html>