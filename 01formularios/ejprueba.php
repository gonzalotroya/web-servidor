<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej</title>
    <link rel="stylesheet" href="estilo.css">

</head>
<body>
<form action="ejprueba.php" method="post">
    <label>numero</label><br/>
    <input type="text" name="numero"><br/>
    <input type="submit" value="Enviar">
</form>    
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    echo $_POST["numero"];
}
?>
</body>
</html>