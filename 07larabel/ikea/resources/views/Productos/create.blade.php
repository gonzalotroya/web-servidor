<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Nuevo Producto</title>
</head>
<body>
    <h1>Nuevo Producto</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = depurar($_POST["nombre"]);
            $fecha_lanzamiento=depurar($_POST["fecha_lanzamiento"]);
            $descripcion=depurar($_POST["descripcion"]);
        }
    
        function depurar($dato) {
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
    ?>

    <form action="{{ route('Productos.store') }}" method="post">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre">
        <span class="error">
                * <?php if(isset($err_nombre)) echo $err_nombre ?>
            </span>
        <br><br>
        <label>Fecha lanzamiento</label>
        <input type="date" name="fecha_lanzamiento">
        <span class="error">
                * <?php if(isset($err_fecha)) echo $err_fecha ?>
            </span>
        <br><br>

        <label class="from-label">Categoria</label>
        <select class="form-select" name="categoria_id">
            @foreach($categorias as $categoria)
            <option value="{{ $categoria ->id}}">{{$categoria ->nombre }}</option>
            @endforeach
        </select>
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