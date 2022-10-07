<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
<h1>Respuesta al formulario</h1>

<?php 
    $nombre=$_POST["nombre"];
    $edad =(int)$_POST["edad"];
    echo ucfirst(strtolower("$nombre"));
    //echo "<p>$edad</p>";
    echo "<br>";
    echo var_dump($edad);

    if ($edad>=18 && $edad<65) {
        echo "<p>$edad es mayor de edad</p>";
    }elseif ($edad>=65 && $edad<=130) {
        echo "<p>$edad es un jubilado</p>";
    }else if($edad>=0 && $edad<18){
        echo "<p>$edad es menor de edad</p>";
    }else {
        echo " Error";
    }
?>
</body>
</html>
