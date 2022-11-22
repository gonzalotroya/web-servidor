<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Videojuegos</title>
</head>
<body>
    <h1>Nueva videojuego</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = depurar($_POST["titulo"]);
            $precio=depurar($_POST["precio"]);
            $PEGI=depurar($_POST["PEGI"]);
            $descripcion=depurar($_POST["descripcion"]);
        }
    
        function depurar($dato) {
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
    ?>

    <form action="" method="post">
        <label>Titulo</label>
        <input type="text" name="titulo">
        <span class="error">
                * <?php if(isset($err_nombre)) echo $err_nombre ?>
            </span>
        <br><br>
        <label>Precio</label>
        <input type="text" name="precio">
        <span class="error">
                * <?php if(isset($err_precio)) echo $err_precio ?>
            </span>
        <br><br>
        <label>PEGI</label>
        <select class="form-select" name="PEGI">
            <option selected disabled hidden>Abir</option>
            <option value="XS">+3</option>
            <option value="S">10+</option>
            <option value="M">16+</option>
            <option value="L">18+</option>
        </select>
        <span class="error">
                * <?php if(isset($err_PEGI)) echo $err_PEGI ?>
            </span>
        <br><br>
        <label>Descripcion</label>
        <span class="error">
                * <?php if(isset($err_descripcion)) echo $err_descripcion ?>
            </span>
        <input type="text" name="descripcion">
        <br><br>


        <input type="submit" value="Enviar">


    </form>
</body>
</html>