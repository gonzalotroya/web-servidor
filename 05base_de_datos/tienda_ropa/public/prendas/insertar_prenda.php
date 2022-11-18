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
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("location: http://localhost/05base_de_datos/tienda_ropa/public/iniciar_sesion.php");
                }
                ?>
    <?php 
    require '../../utils/database.php';
    function depurar($dato)
    {
        $dato=trim($dato);
        $dato=stripslashes($dato);
        $dato=htmlspecialchars($dato);
        return $dato;
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $temp_nombre= depurar($_POST["nombre"]);
        $temp_talla= depurar($_POST["talla"]);
        $temp_precio= depurar($_POST["precio"]);
        if(isset($_POST["categoria"])){
            $temp_categoria= depurar($_POST["categoria"]);
        }else{
            $temp_categoria="";
        }
        
        if (empty($temp_nombre)) {
            $err_nombre="El campo es obligario";
        }else {
            if(strlen($temp_nombre)>40){
                $err_nombre="Demasiado largo";
            }else {
                $nombre=$temp_nombre;
            }
        }

        if (empty($temp_talla)) {
            $err_talla="El campo es obligario";
        }else {
                $talla=$temp_talla;
            
        }

        if (empty($temp_precio)) {
            $err_precio="El campo es obligario";
        }else {
            $temp_precio=round($temp_precio,2);
            $temp_precio=filter_var($temp_precio,FILTER_VALIDATE_FLOAT);
            if(!$temp_precio){
                $err_precio="El precio debe ser un numero";
            }else {
                if($temp_precio<0){
                    $err_precio="El precio no puede ser negativo";
                }elseif ($temp_precio>=10000) {
                    $err_precio="El precio no puede ser igual o superior a 10000";
                }else {
                    $precio=$temp_precio;
                }
            }
        }
        $file_name=$_FILES["imagen"]["name"];
        $file_temp_name=$_FILES["imagen"]["tmp_name"];
        $file_size = $_FILES["imagen"]["size"];
        $file_type = $_FILES["imagen"]["type"];
        $path="../../resources/images/prendas/". $file_name;

        if (empty($temp_categoria)) {
            $err_categoria = "la categoria es obligatoria";
        }else{
            
                $categoria = $temp_categoria;
            }
        }
           
        if (empty($file_name)) {
            $err_imagen = "La imagen es obligatoria";
        } else {
            $file_size = $_FILES["imagen"]["size"];

            if ($file_size > 2000000) {
                $err_imagen = "La imagen no puede pesar más de 2 MB";
            } else {
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);

                $extension_valida = match($extension) {
                    "jpg" => true,
                    "jpeg" => true,
                    "png" => true,
                    default => false
                };

                if (!$extension_valida) {
                    $err_imagen = "La imagen tiene que ser .png, .jpg o .jpeg";
                } else {
                    $new_file_name = "prenda_" . $temp_nombre 
                        . "." . $extension;

                    $path = "./resources/" . $new_file_name;

                    $file_temp_name = $_FILES["imagen"]["tmp_name"];

                    if (move_uploaded_file($file_temp_name, $path)) {
                        echo "<p>Fichero movido con éxito</p>";
                    } else {
                        echo "<p>Fracaso</p>";
                    }
                }
            }
        

        

        if(!empty($nombre)&&!empty($talla)&&!empty($precio)){
            if(move_uploaded_file($file_temp_name, $path)){
                echo "<p>Fichero movido con exito</p>";
            }else {
                echo "<p>No se pudo mover el fichero</p>";
            }
        $imagen="/resources/images/prendas/". $file_name;
        
        if(!empty($categoria)){
            $sql="INSERT INTO prendas(nombre,talla,precio,categoria,imagen) VALUES ('$nombre','$talla','$precio','$categoria','$imagen')";
        }else {
            $sql="INSERT INTO prendas(nombre,talla,precio,imagen) VALUES ('$nombre','$talla','$precio','$imagen')";
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
    <?php require '../header.php' ?>
        <h1>Nueva Prendida</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="from-group mb">
                        <label class="from-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre">
                        <span class="error">
                            * <?php if(isset($err_nombre)) echo $err_nombre ?>
                        </span>
                    </div>
                    <div class="from-group mb"><span class="error">
                        <label class="from-label">Categoria</label>
                        <select class="form-select" name="categoria">
                        <option selected disabled hidden>Abir</option>
                        <option value="Camisetas">Camisetas</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Accesorios">Accesorios</option>
                        </select>
                        * <?php if(isset($err_categoria)) echo $err_categoria ?>
                        </span>
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Talla</label>
                        <select class="form-select" name="talla">
                        <option selected disabled hidden>Abir</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        </select>
                        <span class="error">
                            * <?php if(isset($err_talla)) echo $err_talla ?>
                        </span>
                    </div>
                    <div class="from-group mb">
                        <label class="from-label">Precio</label>
                        <input class="form-control" type="text" name="precio">
                        <span class="error">
                            * <?php if(isset($err_precio)) echo $err_precio ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-lablel">Imagen</label>
                        <input class="form-control" type="file" name="imagen">
                        <span class="error">
                            * <?php if(isset($err_imagen)) echo $err_imagen ?>
                        </span>
                    </div>
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn btn-secondary" href="index.php">Ver prendas</a>
                </form> 
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>