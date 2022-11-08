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
    <div class="container">
        <?php require '../../utils/database.php'; ?>
        <?php require '../header.php' ?>
        <h1>Mostar prendas</h1>
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
                        }
                    }
        }
        echo "<p>$nombre</p>";
            echo "<p>$talla</p>";
            echo "<p>$precio</p>";
            echo "<p>$categoria</p>";
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>