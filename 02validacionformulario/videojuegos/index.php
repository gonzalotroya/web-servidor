<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <h2>Nuevo videojuego</h2>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $temp_titulo= depurar($_POST["titulo"]);
        $temp_precio =depurar($_POST["precio"]);
        if(isset($_POST["consola"])){
            $temp_consola=depurar($_POST["consola"]);
        }else {
            $temp_consola="";
        }
        $temp_descripcion=depurar($_POST["descripcion"]);

        $file_name=$_FILES["imagen"]["name"];
        $file_temp_name=$_FILES["imagen"]["tmp_name"];
        $file_size=$_FILES["imagen"]["size"];
        $file_type=$_FILES["imagen"]["type"];

       /* echo "<p>$file_name</p>";
        echo "<p>$file_temp_name</p>";
        echo "<p>$file_size</p>";
        echo "<p>$file_type</p>";
        */
        //$path="./images/". $file_name;

        $extension=pathinfo($file_name,PATHINFO_EXTENSION);
        //echo "<p>La extension es $extension</p>";
        if(empty($file_size)){
            $err_img="El campo es obligario";
        }elseif ($file_size>1000000) {
            $err_img="El archivo es demasiado grande debe ser inferior a 1 mg";
        }else{
        if (($extension)=="jpg"&&"jpeg"&&"png") {
            echo "<p>Archivo $extension valido</p>";
        }
        if(($extension)!=="jpg"&&"jpeg"&&"png"){
            $err_img= "Archivo $extension invalido tiene que ser jpg, png o jpeg";
        }else {
        $new_file_name="videojuego_". $temp_titulo.".". $extension;
        $path="./images/". $new_file_name;

        if(move_uploaded_file($file_temp_name,$path)){
            echo "<p>Fichero movido con exito</p>";
        }else {
            echo "<p>Fichero  no se pudo mover</p>";
        }
        }
    }
        
        
        
        

        if (empty($temp_titulo)) {
            $err_titulo="El campo es obligario";
        }else {
            if(strlen($temp_titulo)>40){
                $err_titulo="Demasiado largo";
            }else {
                $titulo=$temp_titulo;
            }
        }

        if (empty($temp_consola)) {
            $err_consola="El campo es obligario";
        }else {
            $consola=$temp_consola;
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
        if (empty($temp_descripcion)) {
            $err_descripcion = "la descripcion es obligatoria";
        }else{
            if(strlen($temp_descripcion)>255){
                $err_descripcion="no puede tener tantos caracteres";
            }else{
                $descripcion = $temp_descripcion;
            }
        }

        if(isset($titulo)&& isset($precio)&& isset($consola)&& isset($descripcion)){
            echo "<p>$titulo</p>";
            echo "<p>$precio</p>";
            echo "<p>$consola</p>";
            echo "<p>$descripcion</p>";

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
    <form action="" method="post" enctype="multipart/form-data">
       <p> Titulo: <input type="text" name="titulo">
       <span class="error">
        * <?php if(isset($err_titulo)) echo $err_titulo ?>
       </span>
       </p>
       <p> Precio: <input type="text" name="precio">
       <span class="error">
        * <?php if(isset($err_precio)) echo $err_precio ?>
       </span>
       </p>

       <p> Consola: 
    <select  name="consola">
    <option value="" selected disabled hidden> -- selecciona una opcion -- </option>
    <option value="ps4">ps4</option>
    <option value="xbox">xbox</option>
    <option value="pc">pc</option>
    <option value="Switch">Switch</option>
    </select>
    <span class="error">
        * <?php if(isset($err_consola)) echo $err_consola ?>
    </span>
    </p>
       
    <p> Descripción: <textarea name="descripcion"></textarea>
    <span class="error">
    * <?php if(isset($err_descr)) echo $err_descr ?>
    </span>
    </p>
    <p> Imagen: <input type="file" name="imagen">
    <span class="error">
    * <?php if(isset($err_img)) echo $err_img ?>
    </span>
    </p>
       
       <p><input type="submit" name="Crear"></p>
    
    
    </form>
    
</body>
</html>