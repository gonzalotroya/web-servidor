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
            //$usuario=$_GET["usuario"];
        }
        ?>
        <h1>Compras de <?php echo $usuario; ?></h1>
        <div class="row">
            <div class="col-9">
                <table class=" table table-striped table-hover ">
                    <thead class="table table-dark">
                        <tr>                          
                            <th>Producto</th>
                            <th></th>
                            <th>Talla</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <!--<th>Fecha</th>-->        
                            <th></th>
                            <th></th>          
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($_SERVER["REQUEST_METHOD"]=="POST"){
                            $sql="INSERT INTO clientes_prendas(cliente_id,,prendas_id,cantidad,fecha,talla,)
                             VALUES ('Señorito','$nombre','$cantidad','$fecha','$talla')";

                            $resultado=$conexion ->query($sql);
                            if($conexion -> query($sql)){
                                ?><div class="alert alert-success" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>Compra exitosa</p>";?></button></div><?php 
                            
                            }else{
                                ?><div class="alert alert-danger" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><?php echo "<p>Error al comprar</p>";?></button></div><?php 
                            }
                        }
                        $precio_total=0;
                        $sql="SELECT *FROM prendas";
                        $resultado=$conexion -> query($sql);
                
                        if($resultado -> num_rows > 0){
                            while ($fila = $resultado -> fetch_assoc()){
                                $nombre=$fila["nombre"];
                                $talla=$fila["talla"];
                                $precio=$fila["precio"];
                               // $cantidad=$fila["cantidad"];
                                //$fecha=$fila["fecha"];
                                $imagen=$fila["imagen"];

                                //$precio_total +=($precio * $cantidad);

                                    ?>
                                        <tr>
                                            <td><?php echo $nombre?></td>
                                            <td><img width="50" height="60" src="../../<?php  echo $imagen ?>"></td>
                                            <td><select class="form-select" name="talla">
                                            <option selected disabled hidden>Abir</option>
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <?php echo $cantidad?></select></td>
                                            <td><select class="form-select" name="cantidad"><option selected hidden>1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <?php echo $cantidad?></select></td>
                                            <td><?php echo $precio?></td>
                                            <td><?php //echo $fecha ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <button class="btn btn-primary" type="submit">Comprar</button>
                                                    <input type="hidden" name="id" value="<?php echo $fila["id"]?>">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <h4><span class="badge bg-success">Total: <?php echo $precio ?>€</span></h4>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>