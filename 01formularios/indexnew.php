<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <title>Formularios</title>
    <link rel="stylesheet" href="estilo.css">

</head>
<body>
<div>
        <h2 id="ej1">Ejercicio 1</h2>
        <p>Formulario que reciba un nombre y una edad y los muestre por pantalla</p>
        <form action="#ej1" method="post">
            <label>Nombre</label><br>
            <input type="text" name="nombre"><br><br>
            <label>Edad</label><br>
            <input type="text" name="edad"><br><br>
            <input type="hidden" name="f" value="ej1">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej1") {
                    $nombre = $_POST["nombre"];
                    $edad = $_POST["edad"];

                    echo "<p>$nombre</p>";
                    echo "<p>$edad</p>";
                }
            }
        ?>
    </div>
    <div>
        <h2 id="ej2">
            Ejercicio 2
        </h2>
        <p>Crear un formulario que reciba un número. Generar una lista dinámicamente con tantos elementos como se haya indicado</p>
        <div>
        <form action="#ej2" method="post">
            <label>Número</label><br>
            <input type="text" name="numero"><br><br>
            <input type="hidden" name="f" value="ej2">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej2") {
                    $numero = $_POST["numero"];

                    echo "<p>$numero</p>";
                }
            }
        ?>
    </div>
    </div>

    <div>
        <h2>
            <a href="" id="ej3">Ejercicio 3</a>
        </h2>
        <p>Crear un formulario que reciba el nombre y la edad de una persona y muestre por pantalla si es menor de edad, es adulta, o está jubilada en función a su edad. Además:</p>
        <p>- Convertir la edad a un número entero<br>- Convertir el nombre introducido a minúsculas salvo la primera letra, que será mayúscula</p>
        <form action="#ej3" method="post">
    <label>Nombre</label><br/>
    <input type="text" name="nombre"><br/>
    <label>Edad</label><br/>
    <input type="text" name="edad"><br/>
    <input type="hidden" name="f" value="ej3">
    <input type="submit" value="Enviar">
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["f"] == "ej3") {
            $nombre=$_POST["nombre"];
    $edad =(int)$_POST["edad"];
    echo ucfirst(strtolower("$nombre"));
    //echo "<p>$edad</p>";
    echo "<br>";
    echo var_dump($edad);

    if ($edad>=18 && $edad<65) {
        echo "<p>$edad es mayor de edad</p>";
    }elseif ($edad>=65 && $edad<=130) {
        echo "<p>$edad es un jubilado</p>";
    }else if($edad>=0 && $edad<18){
        echo "<p>$edad es menor de edad</p>";
    }else {
        echo " Error";
    }
        }
    }
    
?>
</form>    
    </div>

    <div>
        <h2 id="ej4">
            <a href="ejercicio4.php">Ejercicio 4</a>
        </h2>
        <p>Crear un formulario que reciba una frase y un número del 1 al 6. Habrá que mostrar la frase en un encabezado de dicho número.</p>
    <form action="#ej4" method="post">
    <label>Frase</label><br/>
    <input type="text" name="Frase"><br/>
    <label>Numero</label><br/>
    <input type="text" name="Numero"><br/>
    <input type="hidden" name="f" value="ej4">
    <input type="submit" value="Enviar">
    <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej4") {
                    $frase=$_POST["Frase"];
    $numero =(int)$_POST["Numero"];
    switch ($numero) {
        case '1':
            echo ucfirst(strtolower("<h1>$frase |op1</h1>"));
            break;
        case '2':
            echo ucfirst(strtolower("<h2>$frase |op2</h2>"));
            break;
        case '3':
            echo ucfirst(strtolower("<h3>$frase |op3</h2>"));
            break;
        case '4':
            echo ucfirst(strtolower("<h4>$frase |op4</h4>"));
            break;
        case '5':
            echo ucfirst(strtolower("<h5>$frase |op5</h5>"));
            break;    
        case '6':
            echo ucfirst(strtolower("<h6>$frase op6</h6>"));
            break;            
        default:
            echo ucfirst(strtolower("<h7>Pon un numero entre 1 y 6 </h7>"));
            break;
    }
                }
            }
        ?>
</form>    
    </div>

    <div>
        <h2 id="ej5">
            <a href="ejercicio5.php">Ejercicio 5</a>
        </h2>
        <p>Formulario que reciba dos números. Devolver el resultado de elevar el primero al segundo. Asegurarse de que funciona con cualquier valor válido. No se admiten exponentes negativos.</p>
        <form action="#ej5" method="post">
    <label>numero</label><br/>
    <input type="text" name="numero"><br/>
    <label>Numero2</label><br/>
    <input type="text" name="Numero2"><br/>
    <input type="hidden" name="f" value="ej5">
    <input type="submit" value="Enviar">
    <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej5") {
                    require 'funciones/potencias.php';
                    $base=$_POST["numero"];
                    $exponente =$_POST["Numero2"];   
                    $resultado = potencia($base,$exponente);
                    if($resultado ==-1){
                        echo "<p>no puede ser negativo</p>";
                    }else {
                        echo "<p>el resultado es $resultado</p>";
                    }
/*
                    $b=$_POST["numero"];
                    $x =$_POST["Numero2"];   
                    $resultado = 1;
                
                    if ($i<0) {
                        echo "el numero no puede ser negativo";
                    }else {
                        for ($i = $x; $i > 0; $i--) {
                            $resultado *= $b;
                        }
                    }
                
                echo "La potencia es {$b}^{$x} = {$resultado}";
                */    
                }
                
            }
        ?>
</form>    
    </div>

    <div>
        <h2 id="ej6">
            <a href="ejercicio6.php">Ejercicio 6</a>
        </h2>
        <p>Formulario que reciba un número. Devolver el factorial de dicho número.</p>
        <form action="#ej6" method="post">
    <label>numero</label><br/>
    <input type="text" name="numero"><br/>
    <input type="hidden" name="f" value="ej6">

    <input type="submit" value="Enviar">
</form>   
    
        <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej6") {
                    require 'funciones/factorial.php';
                    $num=$_POST["numero"];
                    
                    $resultado = factorial($num);
                    if($resultado ==-1){
                        echo "<p>no puede ser negativo</p>";
                    }else {
                        echo "<p>el resultado es $resultado</p>";
                    }
                /*
                    $factorial = 1;
                    
                    for ($x=$num; $x>=1; $x--)
                    {
                        $factorial = $factorial * $x;
                    }
                    
                    echo "El factorial de $num es $factorial";
                    
                  */  
                }
            }
        ?>
    </div>
    <div>
    <h2 id="ej7"><a href="ej7.php">EJ7</a></h2>
    <p> Formulario checkbox</p>
    <form action="#ej7" method="post">
    <label>videojuego</label><br/>
    <input type="text" name="videojuego"><br/>
    
    <label>consola</label><br/>
    <select name="consola">
        <option value="ps4">ps4</option>
        <option value="xbox">xbox</option>
        <option value="Switch">Switch</option>
    
    <label>Edicion especial</label><br/>
    <input type="checkbox" id="especial" name="especial" value="si">
    <label for="especial"> Es especial</label><br>
    <input type="hidden" name="f" value="ej7">

    <input type="submit" value="Enviar">
  
</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if ($_POST["f"] == "ej7") {
    $nombre= $_POST["videojuego"];
    $consola= $_POST["consola"];
    $especial= "";
    if(isset($_POST["especial"])){
        $especial=$_POST["especial"];
    }
$SwitchP=40;
$ps4P=60;
$xboxP=70;
switch ($consola) {
    case 'Switch':
        if($especial=="si"){
            $SwitchP *=1.25;
            echo "El juego $nombre de $consola cuesta $SwitchP";
        }else{
        echo "El juego $nombre de $consola cuesta $SwitchP";
        }
        break;
    case 'ps4':
        if($especial=="si"){
            $ps4P *=1.25;
            echo "El juego $nombre de $consola cuesta $ps4P";
        }else{
        echo "El juego $nombre de $consola cuesta $ps4P";
        }
        break;
    case 'xbox':
        if($especial=="si"){
            $xboxP *=1.25;
            echo "El juego $nombre de $consola cuesta $xboxP";
        }else{
        echo "El juego $nombre de $consola cuesta $xboxP";
        }
        break;      
    default:
        echo "Datos erroneos";
        break;
}
    }
}
?>
</div>
<div>
        <h2 id="ej8">Ejercicio 8</h2>
        <p>Crea un formulario que reciba un número y muestre la tabla de multiplicar de dicho número</p>
        <form action="#ej8" method="post">
            <label>Número</label><br>
            <input type="text" name="numero"><br><br>
            <input type="hidden" name="f" value="ej8">
            <input type="submit" value="Enviar">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["f"] == "ej8") {
                    $numero = $_POST["numero"];
                    echo "<table>";
                    echo "<tr><th>Tabla del $numero</th></tr>";
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<tr>";
                        echo "<td>$numero x $i</td>";
                        echo "<td>" . $numero * $i . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
        ?>
    </div>
    <br>
    <h2><a href="ejprueba.php">Prueba</a></h2>
    <p> Formulario verificación</p>
    
    <p id="volver"><a href="indexnew.php">Volver</a></p>
</body>
</html>