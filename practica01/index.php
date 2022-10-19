<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
    <title>Formularios</title>
    <link rel="stylesheet" href="estilotabla.css">

</head>
<body>
<div>
<h2 id="ej1">Ej1</h2>
<form action="#ej1" method="post">
    <label>numero</label><br/>
    <input type="text" name="numero"><br/>
    <label>numero2</label><br/>
    <input type="text" name="numero2"><br/>
    <input type="hidden" name="f" value="ej1">
    <input type="submit" value="Enviar">

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["f"] == "ej1") {
            require 'funciones.php';
               $a = $_POST['numero'];
               $b = $_POST['numero2'];
               $contador = $b + 1;
            do {
            if (esPrimo($contador)) {
            echo "$contador <tr>";
            $a = $a - 1;
        }
            $contador++;
        } while ($a != 0);
    }
}
    
?>
</form>
</div>


<div>
<h2 id="ej2">Ej2</h2>
<form action="#ej2" method="post">
    <label>DNI</label><br/>
    <input type="text" name="DNI"><br/>
    <input type="hidden" name="f" value="ej2">
    <input type="submit" value="Enviar">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["f"] == "ej2") {
        $DNI=$_POST["DNI"];
        echo "<p>$DNI</p>";
                    $cadena=$DNI;
                    echo "[".substr( $cadena, 9  )."]<br />";
        $letras = match($letras) {
            "A" => "a",
            "B" => "b",
            "C" => "c",
            "D" => "d",
        };        
    
}
}

?>
</form>   
</div>

<div>
<h2 id="ej3">Ej3</h2>
<form action="#ej3" method="post">
<input type="hidden" name="f" value="ej3">
<input type="submit" value="Mostrar tabla">

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["f"] == "ej3") {
    
    $multiplicando;
    $multiplicador;

echo "<table border=5;>";
echo "<tr>";
for ($tabla=1; $tabla<=10  ; $tabla++) { 
	echo "<td>Tabla del $tabla </td>";
}
echo "</tr>";
echo "<tr>";
for ($multiplicador=1; $multiplicador <=10 ; $multiplicador++) { 
	for ($multiplicando=1; $multiplicando <=10 ; $multiplicando++) { 
		echo "<td>$multiplicando X $multiplicador =";
		echo ($multiplicando *$multiplicador);
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";
    }
}
?>  
</form>


</div>

    <p id="volver"><a href="indexnew.php">Volver</a></p>
</body>
</html>