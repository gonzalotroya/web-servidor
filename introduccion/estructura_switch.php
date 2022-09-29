<h1>Estructura switch</h1>

<?php
    $numero=rand(1,3);
    //echo "<p>El numero es  $numero</p>";
    switch ($numero) {
        case 1:
            echo "<p>El $numero es  igual a 1</p>";
            break;
        case 2:
            echo "<p>El $numero es  2</p>";
            break;
        case '3':
            echo "<p>El $numero es  3</p>";
            break;
        default:
        echo "<p>El $numero es  otro</p>";
            break;
    }

    $nota=rand(0,10);
    switch ($nota) {
        case $nota<5:
            echo "<p>Suspenso</p>";
            break;
        case $nota>=5 && $nota<7:
            echo "<p>Aprobado</p>";
            break;
        case $nota>=7 && $nota<9:
            echo "<p>Notable</p>";
            break;
        default:
        echo "<p>Sobresaliente</p>";
            break;
    }
?>