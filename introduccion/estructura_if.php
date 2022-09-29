<h1>Estructura if</h1>

<?php
    $numero=3;

    if($numero>0){
        echo "<p>El numero es positivo</p>";
    }else if($numero<0){
        echo "<p>El numero es negativo</p>";
    }else{
        echo "<p>El numero es 0</p>";
    }

    if($numero % 2==0){
        echo "<p>El $numero es par</p>";
    }else{
        echo "<p>El $numero es impar</p>";
    }

    $alumno="Theodoro I rey de las patatas occidentales";
    $nota=10;
    echo "<p>Datos:$alumno y su nota es $nota</p>";
    if($nota>=5 && $nota<7){
        echo "<p>Aprobado</p>";
    }else if($nota>=7 && $nota<9){
        echo "<p>notable</p>";
    }else if($nota>=9 && $nota<=10){
        echo "<p>Sobresaliente</p>";
    }else if($nota<5){
        echo "<p>Suspenso</p>";
    }else{
        echo "<p>Sobresaliente</p>";
    }

    $usuario="admin";
    $contrasena="123";
    if($usuario=="admin" && $contrasena=="123"){
        echo "<p>Sesion Iniciada</p>";
    }else if($usuario=="admin" && $contrasena !=="123"){
        echo "<p>Contraseña erronea</p>";
    }else{
        echo "<p>Usuario no existe</p>";
    }

?>