<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php
                session_start();
                if(!isset($_SESSION["usuario"])|| ($_SESSION["rol"])!=='administrador'){
                    header("location: http://localhost/05base_de_datos/tienda_ropa/public/iniciar_sesion.php");
                }else{
                echo "<p> Has iniciado sesión ". $_SESSION["usuario"]."</p>"; 
                }
                ?>
    <?php
    require '../../utils/database.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario=$_POST["usuario"];
        $contrasena=$_POST["contrasena"];
        $nombre=$_POST["nombre"];
        $apellido_1=$_POST["apellido_1"];
        $apellido_2=$_POST["apellido_2"];
        $fecha_nacimiento=$_POST["fecha_nacimiento"];
        $hash_contrasena= password_hash($contrasena,PASSWORD_DEFAULT);

        if(isset($_POST["apellido_2"])){
            $apellido_2=$_POST["apellido_2"];
        }else{
            $apellido_2="";
        }
        $apellido_2=!empty($apellido_2) ? "'$apellido_2'" : "NULL";
        $file_name=$_FILES["imagen"]["name"];
        $file_temp_name=$_FILES["imagen"]["tmp_name"];
        $path="../../resources/images/avatar/". $file_name;


        

        if(!empty($usuario)&&!empty($nombre)&&!empty($apellido_1)&&!empty($apellido_2)&&!empty($fecha_nacimiento)){
            if(move_uploaded_file($file_temp_name, $path)){
                echo "<p>Fichero movido con exito</p>";
            }else {
                echo "<p>No se pudo mover el fichero</p>";
            }
        if (empty($imagen))
            {
                $imagen ="/resources/images/avatar/default.jpg";
            }else {
             $imagen="/resources/images/avatar/". $file_name;
            }
        $sql= "INSERT INTO clientes (usuario,contrasena,nombre,apellido_1,apellido_2,fecha_nacimiento,imagen) VALUES ('$usuario','$hash_contrasena','$nombre','$apellido_1',$apellido_2,'$fecha_nacimiento','$imagen')";
            if($conexion -> query($sql)=="TRUE"){
                ?><div class="alert alert-success" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>clientes Insertado</p>";?></button></div><?php 
            }else{
                ?><div class="alert alert-danger" role="alert"><?php echo "<p>Error al insertar</p>";?></div><?php 
            }
       
        }
    }


        
    
    ?>
    <div class="container">
    <?php require '../header.php' 

    ?>
        <h1>Nuevo Usuario</h1>

        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                    <label class="form-label">Usuario</label>
                    <input class="form-control" type="text" name="usuario">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control" name="contrasena" type="password">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">nombre</label>
                    <input class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">apellido_1</label>
                    <input class="form-control" type="text" name="apellido_1">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">apellido_2</label>
                    <input class="form-control" type="text" name="apellido_2">
                    </div>
                    <div class="form-group mb-3">
                    <label class="form-label">fecha_nacimiento</label>
                    <input class="form-control" type="date" name="fecha_nacimiento">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-lablel">Imagen</label>
                        <input class="form-control" type="file" name="imagen">
                    </div>
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn-btn-secundary" href="index.php">Volver</a>

                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    
</body>

</html>