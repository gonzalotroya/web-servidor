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
    $edad =$_POST["edad"];
    echo "<p>$nombre</p>";
    echo "<p>$edad</p>";


    
?>
</body>
</html>
