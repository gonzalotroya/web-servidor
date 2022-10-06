<?php 
echo "La fecha actual es " . date("j l M \of Y");
echo "<br>";
echo date("H \: i");
echo "<br>";
echo date("h \: i a");
echo "<br>";
echo date("d \/ m \/ Y ");
echo "<br>";

$fecha= date("l");
$mes= date("M");
switch ($fecha) {
    case "Monday":
        echo "Hoy es Lunes  ". date("j \d\\e M \d\\e Y");
        break;
    case 'Tuesday':
        echo "Hoy es martes  ". date("j \d\\e M \d\\e Y");
        break;
    case 'Wednesday':
        echo "Hoy es miercoles  ". date("j \d\\e M \d\\e Y");
        break;
    case 'Thursday':
        echo "Hoy es Jueves  ". date("j \d\\e M \d\\e Y");
        break;
    case 'Friday':
        echo "Hoy es viernes  ". date("j \d\\e M \d\\e Y");
        break;
    case 'Saturday':
        echo "Hoy es sabado  ". date("j \d\\e M \d\\e Y");
        break;
    default:
    echo "Hoy es Domingo  ". date("j \d\\e M \d\\e Y");;
        break;
}
?>

<?php
    /*
        Usar la estructura switch para mostrar la 
        fecha actual en español. Por ejemplo: 

        "Hoy es jueves 6 de octubre de 2022"
    */

    $d = date("l");

    switch($d) {
        case "Monday": 
            $dia = "Lunes";
            break;
        case "Tuesday": 
            $dia = "Martes";
            break;
        case "Thursday":
            $dia = "Jueves";
            break;
    }

    $ndia = date("j");

    $m = date("F");

    switch($m) {
        case "January":
            $mes = "Enero";
            break;
        case "February":
            $mes = "Febrero";
            break;
        case "October":
            $mes = "Octubre";
            break;
    }

    $anho = date("Y");

    echo "Hoy es $dia $ndia de $mes de $anho";
    
?>