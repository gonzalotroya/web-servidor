<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <h2>NUevo videojuego</h2>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo depurar($_POST["titulo"]);
        echo depurar($_POST["precio"]);
        if (empty($temp_titulo)) {
            $err_titulo="El campo es obligario";
        }
    }

    function depurar($dato)
    {
        $dato=trim($dato);
        $dato=stripslashes($dato);
        $dato=htmlspecialchars($dato);
        return $dato;
    }
    ?>
    <form action="" method="post">
       <p> Titulo: <input type="text" name="titulo"></p>
       <span class="error">
        * <?php if(isset($err_titulo)) echo $err_titulo ?>
       </span>
       <p> Precio: <input type="text" name="precio"></p>
       <p><input type="submit" name="Crear"></p>
    </form>
    
</body>
</html>