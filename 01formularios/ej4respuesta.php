<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta ej4</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
<h1>Respuesta al formulario</h1>

<?php 
    $frase=$_POST["Frase"];
    $numero =(int)$_POST["Numero"];
    switch ($numero) {
        case '1':
            echo ucfirst(strtolower("<h1>$frase |op1</h1>"));
            break;
        case '2':
            echo ucfirst(strtolower("<h2>$frase |op2</h2>"));
            break;
        case '3':
            echo ucfirst(strtolower("<h3>$frase |op3</h2>"));
            break;
        case '4':
            echo ucfirst(strtolower("<h4>$frase |op4</h4>"));
            break;
        case '5':
            echo ucfirst(strtolower("<h5>$frase |op5</h5>"));
            break;    
        case '6':
            echo ucfirst(strtolower("<h6>$frase op6</h6>"));
            break;            
        default:
            echo ucfirst(strtolower("<h7>Pon un numero entre 1 y 6 </h7>"));
            break;
    }
?>
</body>
</html>