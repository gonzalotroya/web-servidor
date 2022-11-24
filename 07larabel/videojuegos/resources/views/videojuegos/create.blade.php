<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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

    <form action="{{ route('videojuegos.store') }}" method="post">
        @csrf
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
        <select class="form-select" name="pegi">
            <option selected hidden>3</option>
            <option value="3">+3</option>
            <option value="10">10+</option>
            <option value="16">16+</option>
            <option value="18">18+</option>
        </select>
        <span class="error">
                * <?php if(isset($err_PEGI)) echo $err_PEGI ?>
            </span>
        <br><br>
        <div class="form-group mb-3">
            <label>Descripcion</label>
            <span class="error">
                    * <?php if(isset($err_descripcion)) echo $err_descripcion ?>
                </span>
            <textarea name="descripcion"></textarea>
        </div>
        <br><br>


        <input type="submit" value="Enviar">


    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>