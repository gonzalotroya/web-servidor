<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta ej6</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
<h1>Respuesta al formulario</h1>

<?php 
    $num=$_POST["numero"];
    $factorial = 1;
    
    for ($x=$num; $x>=1; $x--)
    {
        $factorial = $factorial * $x;
    }
    
    echo "El factorial de $num es $factorial";

?>
</body>
</html>