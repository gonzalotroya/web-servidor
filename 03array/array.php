<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $juegos=array(
        array("Marcianitos","Arcade" , 10) ,
        array("Bdo","pc" , 20) ,
        array("Killzone","ps2" , 30));
    foreach ($juegos as $juego) {
        list($nombre,$consola,$precio)=$juego;
        echo "Nombre: $nombre";
        echo "Consola: $consola";
        echo "Precio: $precio";
    }
?>
</body>
</html>