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
    $productos=array(
        array("albaricoque", 10) ,
        array("mesa", 20) ,
        array("balon", 30));
?>
<table  class="table table-dark" border="1px">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
        </tr>
        <?php
        $nombre=array_column($productos,0);
        array_multisort($nombre,SORT_ASC,$productos);

        foreach ($productos as $producto) {
            list($nombre,$precio)=$producto;
        ?>
            <tr>
                <td><?php echo $nombre?></td>
                <td><?php echo $precio ?></td>
            </tr>
        <?php
        }
        ?>

    <table class="table table-success table-striped" border="1px">
        <tr>
            <th>Total Precio</th>
            <th>Total Productos</th>
        </tr>
        <?php
        $total=0;
        $totalP=0;
        foreach ($productos as $producto) {
            list($nombre,$precio)=$producto;
            $total +=$precio;
            $totalP++;
        ?>
            <tr>  
                <td><?php echo $total ?></td>
                <td><?php echo $totalP ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
        <!--
            EJ2
        -->
        <?php
          $productos=array(
        array("albaricoque", 10,5) ,
        array("mesa", 20,1) ,
        array("balon", 30,2));
?>
        <h1>EJ2</h1>
        <table  class="table table-dark" border="1px">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>
        <?php
        $nombre=array_column($productos,0);
        array_multisort($nombre,SORT_ASC,$productos);

        foreach ($productos as $producto) {
            list($nombre,$precio,$cantidad)=$producto;
        ?>
            <tr>
                <td><?php echo $nombre?></td>
                <td><?php echo $precio ?></td>
                <td><?php echo $cantidad ?></td>
            </tr>
        <?php
        }
        ?>

    <table class="table table-success table-striped" border="1px">
        <tr>
            <th>Total Precio</th>
            <th>Total Productos</th>
        </tr>
        <?php
        $total=0;
        $totalP=0;
        foreach ($productos as $producto) {
            list($nombre,$precio,$cantidad)=$producto;
            $total +=$precio*$cantidad;
            $totalP += $cantidad;            
        ?>
            <tr>  
                <td><?php echo $total ?></td>
                <td><?php echo $totalP ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
         <!--
            EJ3
        -->
        <table  class="table table-dark" border="1px">
        <tr>
            <th>Numeros</th>
        </tr>
        <?php 
       $numeros=[];
        for( $i=1; $i<=50; $i++ ){
            $numeros[]=$i;
        }
        foreach($numeros as $nu){
            if(($nu % 3)==0){
                unset($numeros[$nu]);
                echo " ".$nu." ";
            }
        }
        ?>
         
        </table>
         <!--
            EJ4
        -->


         <!--
            EJ5
        -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>