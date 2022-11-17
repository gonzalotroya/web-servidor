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
<?php  ?>
<?php
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("location: http://localhost/05base_de_datos/tienda_ropa/public/iniciar_sesion.php");
                }else{
                echo "<p> Has iniciado sesión ". $_SESSION["usuario"]."</p>"; 
                }
                ?>
    <div class="container">
            <?php require '../../utils/database.php'; ?>
            <?php require '../header.php' ?>
            <h1>Mostar prendas</h1>
        <div class="row">
            <div class="col-6">
                
                <?php
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                    $id=$_GET["id"];
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
                }
                echo "<p>$nombre</p>";
                echo "<p>$talla</p>";
                echo "<p>$precio</p>";
                echo "<p>$categoria</p>";
                ?>
                <a class="btn btn-secondary" href="index.php">Volver</a>
                <form action="editar_prenda.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                    <input type="hidden" name="talla" value="<?php echo $talla ?>">
                    <input type="hidden" name="precio" value="<?php echo $precio ?>">
                    <input type="hidden" name="categoria" value="<?php echo $categoria ?>">
                    <?php if($_SESSION["rol"]=='administrador'){?>
                    <button class="btn btn-secondary" href="editar_prenda.php">Editar</button>
                    <?php } ?>
                </form>
            </div>
            <div class="col-6">
                    <img width="200" height="300" class="col-md-6 float-md-start mb-3 ms-md-3" src="../../<?php echo $imagen ?>">
                </div>
            
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>