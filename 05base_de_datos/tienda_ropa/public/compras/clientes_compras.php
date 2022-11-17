<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Clientes Compras</title>
</head>
<body>
    <div class="container">
        <?php require '../../utils/database.php'; ?>
        <?php require '../header.php' ?>
        <?php 
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            $usuario=$_GET["usuario"];
        }
        ?>
        <?php
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("location: http://localhost/05base_de_datos/tienda_ropa/public/iniciar_sesion.php");
                }else{
                echo "<p> Has iniciado sesión ". $_SESSION["usuario"]."</p>"; 
                }
                ?>
        <h1>Compras de <?php echo $usuario; ?></h1>
        <div class="row">
            <div class="col-9">
                <table class=" table table-striped table-hover ">
                    <thead class="table table-dark">
                        <tr>                          
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                            <th>Fecha</th>                  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $precio_total=0;
                        $sql="SELECT *FROM vw_clientes_prendas WHERE usuario='$usuario'";
                        $resultado=$conexion -> query($sql);
                
                        if($resultado -> num_rows > 0){
                            while ($fila = $resultado -> fetch_assoc()){
                                $producto=$fila["producto"];
                                $cantidad=$fila["cantidad"];
                                $precio_unitario=$fila["precio_unitario"];
                                $fecha=$fila["fecha"];
                                $precio_total +=($precio_unitario * $cantidad);
                                    ?>
                                        <tr>
                                            <td><?php echo $producto?></td>
                                            <td><?php echo $cantidad?></td>
                                            <td><?php echo $precio_unitario?></td>
                                            <td><?php echo $precio_unitario*$cantidad ?></td>
                                            <td><?php echo $fecha ?></td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <h4><span class="badge bg-success">Total: <?php echo $precio_total ?>€</span></h4>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>