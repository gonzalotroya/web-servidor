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
<form action="ej1.php" method="post">
    <label>nombre</label><br/>
    <input type="text" name="nombre"><br/>
    <label>edad</label><br/>
    <input type="text" name="edad"><br/>
    <input type="submit" value="Enviar">
</form>    
<?php
require 'footer.php'
?>
</body>
</html>

