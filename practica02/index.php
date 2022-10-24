<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Registro</title>
</head>
<body>
<div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_DNI=depurar($_POST["DNI"]);
        $temp_nombre= depurar($_POST["nombre"]);
        $temp_apellidos= depurar($_POST["apellidos"]);
        $temp_apellidos2=depurar($_POST["apellidos2"]);
        $temp_DNI=depurar($_POST["DNI"]);
        $temp_email=depurar($_POST["email"]);
        $temp_fecha=depurar($_POST["fecha"]);

        $pattern ="/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/";
        $patternDNI ="/^[0-9]{8}[A-zA-Z]+$/";
        $patternFecha="/^[0-3][0-9]\/[0-1][0-9]\/(19|20)[0-9]{2}$/";

        if (empty($temp_DNI)){
            $err_DNI="el dni es obligatorio";
        }else{
            if(strlen($temp_DNI)>=10 && strlen($temp_DNI)<=8){
                $err_DNI="El DNI no tiene sufiecientes caracteres o sobran";
            }else{
                if(preg_match($patternDNI,$temp_DNI)){
                    echo "<p>$temp_DNI sigue el patron</p>";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                            $resultado=(int)$temp_DNI%23;
                            $letra = match($resultado){
                                0 => "T",
                                1 => "R",
                                2 => "W",
                                3 => "A",
                                4 => "G",
                                5 => "M",
                                6 => "Y",
                                7 => "F",
                                8 => "P",
                                9 => "D",
                                10 => "X",
                                11 => "B",
                                12 => "N",
                                13 => "J",
                                14 => "Z",
                                15 => "S",
                                16 => "Q",
                                17 => "V",
                                18 => "H",
                                19 => "L",
                                20 => "C",
                                21 => "K",
                                22 => "E",
                            };          
                            if(strlen($temp_DNI)>=10 || strlen($temp_DNI)<=8){
        
                                echo "faltan o sobran caracteres";
        
                            }else{            
                                $letra_introducida =substr($temp_DNI,-1);       

                                if($letra_introducida!==$letra){
                                    echo "<p>La letra $letra_introducida es incorrecta en el DNI $temp_DNI </p>";
                                    echo "<p>La letra $letra es la correcta</p>";
                                }else if($letra_introducida==$letra){
                                
                                    echo "<p>La letra $letra_introducida es correcta en el DNI $temp_DNI </p>";
                                }
                                
                                }
                            }
                        
                    $DNI=$temp_DNI;
                }else{
                    echo "<p>$temp_DNI no sigue el patron</p>";
                }
            }
        }

        if (empty($temp_nombre)) {
            $err_nombre = "El nombre es obligatorio";
        }else{
            if(strlen($temp_nombre)>40){
                $err_titulo="no puede tener tantos caracteres";
            }else{
                if(preg_match($pattern,$temp_nombre)){
                    echo "<p>". mb_convert_case($temp_nombre,MB_CASE_TITLE,"UTF-8") ." sigue el patron</p>";

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
                    echo "<p>". mb_convert_case($temp_apellidos,MB_CASE_TITLE,"UTF-8") ." sigue el patron</p>";

                    $apellidos=$temp_apellidos;
                }else{
                    echo "<p>$temp_apellidos no sigue el patron</p>";
                }
            }    
        }
        
        if (empty($temp_apellidos2)){
            $err_apellidos2="el apellido es obligatiorio";
        }else{
            if(strlen($temp_apellidos2)>40){
                $err_titulo2="no puede tener tantos caracteres";
            }else{
                if(preg_match($pattern,$temp_apellidos)){
                    echo "<p>". mb_convert_case($temp_apellidos2,MB_CASE_TITLE,"UTF-8") ." sigue el patron</p>";

                    $apellidos2=$temp_apellidos2;
                }else{
                    echo "<p>$temp_apellidos2 no sigue el patron</p>";
                }
            }    
        }
    
    if (empty($temp_email)){
        $err_email="el email es obligatiorio";
    }else if(str_contains($temp_email,"nigga")){
        echo "<p>$temp_email contiene palabras prohibidas introduce un email correcto</p>";
    }else if(str_contains($temp_email,"negrata")){
        echo "<p>$temp_email contiene palabras prohibidas introduce un email correcto</p>";
    }else if(str_contains($temp_email,"nigger")){
        echo "<p>$temp_email contiene palabras prohibidas introduce un email correcto</p>";
    }else if(filter_var($temp_email,FILTER_VALIDATE_EMAIL)==true){
        echo "<p>$temp_email correcto</p>";
    }else {
        echo "<p>$temp_email no es correcto</p>";
    }
    
    
    if (empty($temp_fecha)){
        $err_fecha="la fecha es obligatioria";
    }else {
        if ($temp_fecha<18) {
            echo "Es menor de edad,no puedes ser menor de edad";
        }elseif ($temp_fecha>120 || $temp_fecha<0) {
            echo "Lo siento no creo que sigas vivo";
        }elseif(preg_match($patternFecha,$temp_fecha)){
            echo "<p>$temp_fecha sigue el patron</p>";
            $fecha=$temp_fecha;
            }
        else{
            echo "<p>$temp_fecha no sigue el patron</p>";
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
        <label>Primer apellido</label>
        <input type="text" name="apellidos">
        <span class="error">
                * <?php if(isset($err_primerApellido)) echo $err_primerApellido ?>
            </span>
        <br><br>
        <label>Segundo apellido</label>
        <input type="text" name="apellidos2">
        <span class="error">
                * <?php if(isset($err_segundoApellido)) echo $err_segundoApellido ?>
            </span>
        <br><br>
        <label>DNI</label>
        <input type="text" name="DNI">
        <span class="error">
                * <?php if(isset($err_DNI)) echo $err_DNI ?>
            </span>
        <br><br>
        <label>Email</label>
        <input type="text" name="email">
        <span class="error">
                * <?php if(isset($err_email)) echo $err_email ?>
            </span>
        <br><br>
        <label>Edad</label>
        <input type="text" name="fecha">
        <span class="error">
                * <?php if(isset($err_fecha)) echo $err_fecha?>
            </span>
        <br><br>
        <input type="submit" value="Enviar">

    </form>
    </div>
</body>
</html>