<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Editar</title>
</head>
<body>
<div class="container">
            <?php                session_start(); 
            require '../../utils/database.php'; ?>
            <?php require '../header.php' ?>
            <h1>Editar clientes</h1>
        <div class="row">
            <div class="col-6">
                <?php
                if(!isset($_SESSION["usuario"])){
                    header("location: http://localhost/05base_de_datos/tienda_ropa/public/iniciar_sesion.php");
                }
                ?>
                <?php
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                   $id=$_GET["id"];
                   $usuario=$_GET["usuario"];
                   $nombre=$_GET["nombre"];
                   $apellido_1=$_GET["apellido_1"];
                   $apellido_2=$_GET["apellido_2"];
                   $fecha_nacimiento=$_GET["fecha_nacimiento"];
                }

                   if($_SERVER["REQUEST_METHOD"]=="POST"){
                    $id=$_POST["id"];
                    $usuario=$_POST["usuario"];
                    $nombre=$_POST["nombre"];
                    $apellido_1=$_POST["apellido_1"];
                    $apellido_2=$_POST["apellido_2"];
                    $fecha_nacimiento=$_POST["fecha_nacimiento"];

                    $sql ="UPDATE clientes SET usuario='$usuario',nombre='$nombre',apellido_1='$apellido_1',apellido_2='$apellido_2'
                    ,fecha_nacimiento='$fecha_nacimiento' WHERE id='$id'";
                    
                    if($conexion -> query($sql)=="TRUE"){
                        ?><div class="alert alert-success" role="alert">
                            <?php echo "<p>Cliente insertado</p>";?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button></div><?php 

                    }else{
                        ?><div class="alert alert-danger" role="alert">
                            <?php echo "<p>Error al modificar</p>";?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button></div><?php 
                    }
                   }
                    $sql ="SELECT * FROM clientes";
                            $resultado=$conexion ->query($sql);
                            if($resultado -> num_rows >0){
                                while ($fila = $resultado -> fetch_assoc()) {
                                    $usuario=$fila["usuario"];
                                    $nombre=$fila["nombre"];
                                    $apellido_1=$fila["apellido_1"];
                                    $apellido_2=$fila["apellido_2"];
                                    $fecha_nacimiento=$fila["fecha_nacimiento"];
                                    $imagen=$fila["imagen"];
                                }
                            }

                ?>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                     <div class="from-group mb">
                        <label class="from-label">Usuario</label>
                        <input class="form-control" type="text" value="<?php echo $usuario ?>" name="usuario">
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Nombre</label>
                        <input class="form-control" type="text" value="<?php echo $nombre ?>" name="nombre">
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">apellido_1</label>
                        <input class="form-control" type="text" value="<?php echo $apellido_1 ?>" name="apellido_1">
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">apellido_2</label>
                        <input class="form-control" type="text" value="<?php echo $apellido_2 ?>" name="apellido_2">
                    </div>

                    <div class="from-group mb">
                        <label class="from-label">fecha_nacimiento</label>
                        <input class="form-control" type="date" value="<?php echo $fecha_nacimiento ?>" name="fecha_nacimiento">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button class="btn btn-primary" type="submit">Modificar</button>
                    <a class="btn btn-secondary" href="index.php">Ver clientes</a>
                </form> 
            <div class="col-6">
                    <img width="200" height="300" class="col-md-6 float-md-start mb-3 ms-md-3" src="../../<?php echo $imagen ?>">
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>