<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Nueva prenda</title>
</head>
<body>
    <?php 
    require '../../utils/database.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $nombre=$_POST["nombre"];
        $talla=$_POST["talla"];
        $precio=$_POST["precio"];
        if(isset($_POST["categoria"])){
            $categoria=$_POST["categoria"];
        }else{
            $categoria="";
        }

        if(!empty($nombre)&&!empty($talla)&&!empty($precio)){
            if(!empty($categoria)){
            $sql="INSERT INTO prendas(nombre,talla,precio,categoria) VALUES ('$nombre','$talla','$precio','$categoria')";
        }else {
            $sql="INSERT INTO prendas(nombre,talla,precio) VALUES ('$nombre','$talla','$precio')";
        }
        if($conexion -> query($sql)=="TRUE"){
            echo "<p>Prenda insertada</p>";
        }else{
            echo "<p>Error al insertar</p>";
        }
        }
    }
    ?>
    <div class="container">
        <h1>Nueva Prendida</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="post">
                    <div class="from-group mb">
                        <label class="from-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre">
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Categoria</label>
                        <select class="form-select" name="categoria">
                        <option selected disabled hidden>Abir</option>
                        <option value="Camisetas">Camisetas</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Accesorios">Accesorios</option>
                        </select>
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Talla</label>
                        <select class="form-select" name="talla">
                        <option value="" selected disabled hidden>Abir</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        </select>

                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Precio</label>
                        <input class="form-control" type="text" name="precio">
                    </div>
            
                    <button class="btn btn-primary" type="submit">Crear</button>
                </form> 
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>