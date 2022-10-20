<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNImatch</title>
</head>
<body>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $temp_nombre = depurar($_POST["nombre"]);
            $temp_apellidos= depurar($_POST["apellidos"]);
            $temp_DNI=depurar($_POST["DNI"]);

            $pattern ="/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";
            $patternDNI ="/^[0-9]{8}[A-Z]+$/";


            if (empty($temp_nombre)) {
                $err_nombre = "El nombre es obligatorio";
            }else{
                if(strlen($temp_nombre)>40){
                    $err_titulo="no puede tener tantos caracteres";
                }else{
                    if(preg_match($pattern,$temp_nombre)){
                        echo "<p>$temp_nombre sigue el patron</p>";

                        $nombre=$temp_nombre;
                    }else{
                        echo "<p>$temp_nombre no sigue el patron</p>";
                    }
                }
                
            }   
            if (empty($temp_apellidos)){
                $err_apellidos="el apellido es obligatiorio";
            }else{
                if(strlen($temp_apellidos)>40){
                    $err_titulo="no puede tener tantos caracteres";
                }else{
                    if(preg_match($pattern,$temp_apellidos)){
                        echo "<p>$temp_apellidos sigue el patron</p>";

                        $apellidos=$temp_apellidos;
                    }else{
                        echo "<p>$temp_apellidos no sigue el patron</p>";
                    }
                }    
            }
        }
        if (empty($temp_DNI)){
            $err_DNI="el DNI es obligatiorio";
        }else{
            if(strlen($temp_DNI)<=8 && strlen($temp_DNI)>=10){
                $err_DNI="no puede tener tantos caracteres";
            }else{
                if(preg_match($patternDNI,$temp_DNI)){
                    echo "<p>$temp_DNI sigue el patron</p>";

                    $DNI=$temp_DNI;
                }else{
                    echo "<p>$temp_DNI no sigue el patron</p>";
                }
            }    
        }
    
        function depurar($dato) {
            $dato = trim($dato);
            $dato = stripslashes($dato);
            $dato = htmlspecialchars($dato);
            return $dato;
        }
    ?>
    <form action="" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre">
        <span class="error">
                * <?php if(isset($err_nombre)) echo $err_nombre ?>
            </span>
        <br><br>
        <label>Apellidos</label>
        <input type="text" name="apellidos">
        <span class="error">
                * <?php if(isset($err_apellidos)) echo $err_apellidos ?>
            </span>
        <br><br>
        <label>DNI</label>
        <span class="error">
                * <?php if(isset($err_DNI)) echo $err_DNI ?>
            </span>
        <input type="text" name="DNI">
        <br><br>
        <input type="submit" value="Enviar">


    </form>
</body>
</html>