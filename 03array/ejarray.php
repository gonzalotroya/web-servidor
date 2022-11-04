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
<table  class="table table-dark">
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
        <table  class="table table-dark">
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
                ?><td><?php echo $nu;?></td><?php
            }
        }
        ?>
        </table>
         <!--
            EJ4
        -->
        <?php
        $personas=array(
        array("paco", "chocolatero",rand(0,100)) ,
        array("pepe","tu tio pesao",rand(0,100)) ,
        array("Adolfo","Hilde", rand(0,100))
        );
        ?>
        <table  class="table table-dark">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Estado</th>
        </tr>
        <?php
        foreach ($personas as $per) {
            list($nombre,$apellido,$edad)=$per;
        ?>
            <tr>
                <td><?php echo $nombre?></td>
                <td><?php echo $apellido ?></td>
                <td><?php echo $edad ?></td>
                <td><?php  $estado=false; echo mayoria($edad) ?></td>
            </tr>
        <?php
        }
        function mayoria($edad){
            $estado=match(true){
                $edad >=65 => "jubilado",
                $edad >=18 && $edad <=65 => "Mayor de edad",
                $edad <18 => "Menor de edad",
            };
            return $estado;
        }
        ?>
         <!--
            EJ5
        -->
        <?php
        $identificador=array(
        array("paco","12345678L") ,
        array("pepe","87654321D") ,
        array("Adolfo","25608448N")
        );
        ?>
        <table  class="table table-dark">
        <tr>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Letra valida</th>
        </tr>
        <?php
        foreach ($identificador as $DN) {
            list($nombre,$temp_DNI)=$DN;
        ?>
            <tr>
                <td><?php echo $nombre?></td>
                <td><?php echo $temp_DNI ?></td>
                <td><?php echo validador($temp_DNI) ?></td>
            </tr>
        <?php
        }
        function validador($temp_DNI){
            $patternDNI ="/^[0-9]{8}[A-Z]+$/"; 
                if(strlen($temp_DNI)>=10 && strlen($temp_DNI)<=8){
                    $err_DNI="El DNI no tiene sufiecientes caracteres o sobran";
                }else{
                    if(preg_match($patternDNI,$temp_DNI)){            
                                $resultado=(int)$temp_DNI%23;
                                $letra = match($resultado){
                                    0 => "T",
                                    1 => "R",
                                    2 => "W",
                                    3 => "A",
                                    4 => "G",
                                    5 => "M",
                                    6 => "Y",
                                    7 => "F",
                                    8 => "P",
                                    9 => "D",
                                    10 => "X",
                                    11 => "B",
                                    12 => "N",
                                    13 => "J",
                                    14 => "Z",
                                    15 => "S",
                                    16 => "Q",
                                    17 => "V",
                                    18 => "H",
                                    19 => "L",
                                    20 => "C",
                                    21 => "K",
                                    22 => "E",
                                };          
                                
                    }else{
                        $err_DNI="<p>$temp_DNI no sigue el patron</p>";
                    }
                }
                return $letra;

            }
        ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>