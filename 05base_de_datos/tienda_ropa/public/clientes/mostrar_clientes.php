<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Mostrar clientes</title>
</head>
<body>
<?php  ?>
    <div class="container">
            <?php require '../../utils/database.php'; ?>
            <?php require '../header.php' ?>
            <h1>Mostar cliente</h1>
        <div class="row">
            <div class="col-6">
                <?php
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                    $id=$_GET["id"];
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
                }
                echo "<p>$usuario</p>";
                echo "<p>$nombre</p>";
                echo "<p>$apellido_1</p>";
                echo "<p>$apellido_2</p>";
                echo "<p>$fecha_nacimiento</p>";
                ?>
                <a class="btn btn-secondary" href="index.php">Volver</a>
                <form action="editar_clientes.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="usuario" value="<?php echo $usuario ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                    <input type="hidden" name="apellido_1" value="<?php echo $apellido_1 ?>">
                    <input type="hidden" name="apellido_2" value="<?php echo $apellido_2 ?>">
                    <input type="hidden" name="fecha_nacimiento" value="<?php echo $fecha_nacimiento ?>">
                    
                    <button class="btn btn-secondary" href="editar_clientes.php">Editar</button>

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