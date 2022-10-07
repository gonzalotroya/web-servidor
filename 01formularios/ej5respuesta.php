<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta ej5</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
<h1>Respuesta al formulario</h1>

<?php 
    $b=$_POST["numero"];
    $x =$_POST["Numero2"];   
    $resultado = 1;

for ($i = $x; $i > 0; $i--) {
    $resultado *= $b;
}
echo "La potencia es {$b}^{$x} = {$resultado}";
    
    
?>
</body>
</html>