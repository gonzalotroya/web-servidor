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
            <?php require '../../utils/database.php'; ?>
            <?php require '../header.php' ?>
            <h1>Editar prendas</h1>
            <?php
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("location: http://localhost/05base_de_datos/tienda_ropa/public/iniciar_sesion.php");
                }else{
                echo "<p> Has iniciado sesión ". $_SESSION["usuario"]."</p>"; 
                }
                ?>
        <div class="row">
            <div class="col-6">
                <?php
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                   $id=$_GET["id"];
                   $nombre=$_GET["nombre"];
                   $talla=$_GET["talla"];
                   $precio=$_GET["precio"];
                   $categoria=$_GET["categoria"];
                }

                   if($_SERVER["REQUEST_METHOD"]=="POST"){
                    $id=$_POST["id"];
                    $nombre=$_POST["nombre"];
                    $talla=$_POST["talla"];
                    $precio=$_POST["precio"];
                    $categoria=$_POST["categoria"];

                    $sql ="UPDATE prendas SET nombre='$nombre',talla='$talla',precio='$precio'
                    ,categoria='$categoria' WHERE id='$id'";
                    
                    if($conexion -> query($sql)=="TRUE"){
                        ?><div class="alert alert-success" role="alert">
                            <?php echo "<p>Prenda insertada</p>";?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button></div><?php 

                    }else{
                        ?><div class="alert alert-danger" role="alert">
                            Error al modificar
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button></div><?php 
                    }
                   }
                    $sql ="SELECT * FROM prendas";
                            $resultado=$conexion ->query($sql);
                            if($resultado -> num_rows >0){
                                while ($fila = $resultado -> fetch_assoc()) {
                                    $nombre=$fila["nombre"];
                                    $talla=$fila["talla"];
                                    $precio=$fila["precio"];
                                    $categoria=$fila["categoria"];
                                    $imagen=$fila["imagen"];
                                }
                            }

                ?>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="from-group mb">
                        <label class="from-label">Nombre</label>
                        <input class="form-control" type="text" value="<?php echo $nombre ?>" name="nombre">
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Categoria</label>
                        <select class="form-select" name="categoria">
                        <option value="<?php echo $categoria ?>"selected hidden><?php echo ucfirst(strtolower($categoria)) ?></option>
                        <option value="Camisetas">Camisetas</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Accesorios">Accesorios</option>
                        </select>
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Talla</label>
                        <select class="form-select" name="talla">
                        <option value="<?php echo $talla ?>" selected hidden><?php echo ucfirst(strtolower($talla)) ?></option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        </select>

                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Precio</label>
                        <input class="form-control" type="text" value="<?php echo $precio ?>" name="precio">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button class="btn btn-primary" type="submit">Modificar</button>
                    <a class="btn btn-secondary" href="index.php">Ver prendas</a>
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