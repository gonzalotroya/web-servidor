<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Index</title>
</head>
<body>
    <div class="container">
        <?php  require './utils/database.php'; ?>
        <?php 
         if($_SERVER["REQUEST_METHOD"]=="POST"){
            $usuario=$_POST["usuario"];
            $contrasena=$_POST["contrasena"];

            $hash_contrasena= password_hash($contrasena,PASSWORD_DEFAULT);
         
            $sql="SELECT * FROM usuarios WHERE usuario='$usuario'";

            $resultado=$conexion -> query($sql);
            if($resultado -> num_rows > 0){
                while ($fila = $resultado -> fetch_assoc()){
                $hash_contrasena=$fila["contrasena"];
                }
                $acceso_valido=password_verify($contrasena,$hash_contrasena);
                if($acceso_valido==TRUE){
                    ?><div class="alert alert-success" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>Login exitosa</p>";?></button></div><?php 
                    
                    session_start();
                    $_SESSION["usuario"]=$usuario;

                    header('location:index.php');
                }else{
                    ?><div class="alert alert-danger" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>Error al iniciar</p>";?></button></div><?php 
                }
            }
        }      
        ?>
        <h1>Iniar sesion</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" name="usuario" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control" name="contrasena" type="password">
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit">Iniciar sesion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>