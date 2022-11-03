<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Ej arrays</title>
</head>
<body>
    <div class="container">
    <?php 
    $videojuegos=array(
        "juego1"=>"Cyberpunk 2077",
        "juego2"=>"Minecraft",
        "juego3"=>"Pony",
    );
    print_r($videojuegos);
    echo"<br>";
    $consola=[
        "consola1"=>"ps4",
        "consola2"=>"ps5",
        "consola3"=>"xbox",
    ];
    print_r($consola);
    echo"<br>";
    $DNI=[
        "12345678L"=>"JOse",
        "12345778M"=>"Pep",
        "22334455K"=>"emilio",
    ];
    krsort($DNI);
    print_r($DNI);
    
    echo"<br>";

    $series = [
        'El juego del calamar',
        'La casa de papel',
        'Alice in borderland',
        'The Witcher'
    ];
    array_push($series,"Cuentame","Dark");
    $series[]="Big bang";
    $series[10]="La que se avecina";
    array_push($series,"Pochita");
    unset($series[10]);
    array_push($series,"Ramon");
    print_r($series);
    echo"<br>";
    $series[12]="Ramona";
    print_r($series);
    echo"<br>";
    unset($series[12]);
    $series=array_values($series);
    print_r($series);
    echo"<br>";

    echo "Hay".count($series) ."elementos";
    echo"<br>";
    echo"<br>";
    ?>
    <ul>
    <?php
    asort($series);
    $j = count($series);
    for($i = 0; $i < $j ; $i++) {
        ?>
        <li><?php print_r($series[$i]);?></li>
        <?php
    }
    ?>
    </ul>

    <ol>
    <?php
    $i = 0;
    while($i < count($series)) {
        ?>
        <li><?php print_r($series[$i]);?></li>
        <?php
        $i++;
    }
    ?>
    </ol>

<?php
asort($series); 
foreach($series as $key =>$serie){
    echo $key . "=>" . $serie ."<br>";
}
?>
<div>
<table border="1px">
<tr>
    <td>DNI</td>
    <td>Nombre</td>
</tr>
<?php 
    foreach($DNI as $key =>$DNI){
        echo $key . "=>" . $DNI ."<br>";
    ?>
        <tr>
            <td><?php echo $key?></td>
            <td><?php echo $DNI?></td>
        </tr>
        <?php   
    }
 ?>
</table>
</div>
<br>
<?php
/*
echo "<table border='1px'>";
echo "<tr>";
    echo"<td>DNI</td>";
    echo"<td>Nombre</td>";
echo "</tr>"; 
    foreach($DNI as $key => $DNI){
        echo $key . "=>" . $DNI ."<br>";
       echo" <tr>";
            echo"<td>". $key."</td>";
            echo"<td>". $DNI."</td>";
        echo "</tr>";
    }
echo "</table>";
*/
?>
<?php
    $frutas_1=["Melocoton","Sandia","Kiwi"];

    $frutas_2=["Sandia","Melocoton","Kiwi"];

    if ($frutas_1 == $frutas_2){
        if ($frutas_1 === $frutas_2){
            echo "<p>las frutas son las mismas y estan igual ordenadas</p>";
        
        }else{
            echo "<p>las frutas son las mismas pero no estan iguales</p>";
        }
    }else{
        echo "<p>las frutas no son las mismas </p>";
    }
?>
<?php
    $juegos=array(
        array("Marcianitos","Arcade" , 10) ,
        array("Bdo","pc" , 20) ,
        array("Killzone","ps2" , 30));

    $nuevo_juego=["Fruit Ninja","movil",0];
    array_push($juegos,$nuevo_juego);
    unset($juegos[1]);

    $titulo=array_column($juegos,0);
    $consola=array_column($juegos,1);
    array_multisort($titulo,SORT_ASC,$consola,SORT_DESC,$juegos);
    foreach ($juegos as $juego) {
        list($nombre,$consola,$precio)=$juego;
        echo "Nombre: $nombre <br>";
        echo "Consola: $consola <br>";
        echo "Precio: $precio <br>";
    }
?>
<div>
<table border="1px">
<tr>
    <td>Nombre</td>
    <td>Consola</td>
    <td>Precio</td>
</tr>
<?php 
    foreach ($juegos as $juego) {
        list($nombre,$consola,$precio)=$juego;
       /* echo "Nombre: $nombre <br>";
        echo "Consola: $consola <br>";
        echo "Precio: $precio <br>";
        */
    
    ?>
        <tr>
            <td><?php echo $nombre?></td>
            <td><?php echo $consola?></td>
            <td><?php echo $precio?></td>
        </tr>
    <?php   
    }
 ?>
</table>
</div>
<?php 
$numeros=[];
for($i = 2; $i <= 50 ; $i+=2) {
    ?>
    <?php $numeros[]=$i;?>
    <?php
}
shuffle($numeros);
rsort($numeros);
?>
<?php
for($i = 0; $i < count($numeros) ; $i++) {
    ?>
    <ol><?php echo($numeros[$i]);?></ol>
    <?php
}
?> 

<?php
    $numeros = [];

    for($i = 1; $i <= 10; $i++) {
        $numeros[] = rand(0,100);
    }
    ?>

    <h2>Números ordenados de mayor a menor</h2>
    <ul>
        <?php
        rsort($numeros);
        for ($i = 0; $i < count($numeros); $i++) {
            echo "<li>" . $numeros[$i] . "</li>";
        }
        ?>
    </ul>

    <h2>Números ordenados de menor a mayor</h2>
    <ul>
        <?php
        sort($numeros);
        for ($i = 0; $i < count($numeros); $i++) {
            echo "<li>" . $numeros[$i] . "</li>";
        }
        ?>
    </ul>
<?php
$paises = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", 
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", 
"Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", 
"Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", 
"Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", 
"Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");
ksort($paises);
    ?>
    <table class="tabla" border="1px">
        <tr>
            <th>País</th>
            <th>Capital</th>
        </tr>
        <?php
        foreach ($paises as $pais => $capital) {
        ?>
            <tr>
                <td><?php echo $pais ?></td>
                <td><?php echo $capital ?></td>
            </tr>
        <?php
        }
        ?>
    </table>




<?php 
$ser=array(
    array("Dark","Netflix" , 3) ,
    array("Edgerunner","Netflix" , 1) ,
    array("Vigilante","Netflix" , 1),
    array("Band of brothers","hbo",1),
    array("Andor","Disney+",1)
);
?>

    <table class="tabla" border="1px">
        <tr>
            <th>Titulo</th>
            <th>Plataforma</th>
            <th>Temporadas</th>

        </tr>
        <br>
        <?php
        $temporadas=array_column($ser,2);
        array_multisort($temporadas,SORT_DESC,$ser);
        foreach ($ser as $se) {
            list($titulo,$plataforma,$temporadas)=$se;
        ?>
            <tr>
                <td><?php echo $titulo?></td>
                <td><?php echo $plataforma ?></td>
                <td><?php echo $temporadas ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <table class="tabla" border="1px">
        <tr>
            <th>Titulo</th>
            <th>Plataforma</th>
            <th>Temporadas</th>

        </tr>
        <?php
        $titulo=array_column($ser,0);
        array_multisort($titulo,SORT_ASC,$ser);
        foreach ($ser as $se) {
            list($titulo,$plataforma,$temporadas)=$se;
        ?>
            <tr>
                <td><?php echo $titulo?></td>
                <td><?php echo $plataforma ?></td>
                <td><?php echo $temporadas ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <table class="tabla" border="1px">
        <tr>
            <th>Titulo</th>
            <th>Plataforma</th>
            <th>Temporadas</th>

        </tr>
        <?php
        $titulo=array_column($ser,0);
        $plataforma=array_column($ser,1);
        array_multisort($plataforma,SORT_ASC,$titulo,SORT_ASC,$ser);
        foreach ($ser as $se) {
            list($titulo,$plataforma,$temporadas)=$se;
        ?>
            <tr>
                <td><?php echo $titulo?></td>
                <td><?php echo $plataforma ?></td>
                <td><?php echo $temporadas ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
<div class="row">
    <div class="col-6">


<?php 
 function calificacion (int $nota) {
    if ($nota < 5) {
        $calificacion = "Suspenso";
    } else if ($nota >= 5 && $nota < 7) {
        $calificacion = "Aprobado";
    } else if ($nota >= 7 && $nota < 9) {
        $calificacion = "Notable";
    } else {
        $calificacion = "Sobresaliente";
    }
    return $calificacion;
}
//$estudiantes=[["Luis",rand(0,10)],["Luisa",rand(0,10)],["Paco",rand(0,10)]];
$estudiantes=[["Luis"],["Luisa"],["Paco"]];
for ($i=0; $i < count($estudiantes); $i++) { 
    $estudiantes[$i][1]=rand(0,10);
    $estudiantes[$i][2]=rand(0,10);
    $estudiantes[$i][3]=rand(0,10);
}
?>
<?php 
function calificacionMatch( int $media){
    $calificacion=match(true){
        $media <5 => "Suspenso",
        $media >=5 and $media  <7 => "Aprobado",
        $media >=7 and $media  <9 => "Notable",
        default => "Sobresaliente",

    };
    return $calificacion;
}?>
<table class="table" border="1px">
        <tr>
            <th>Nombre</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Calificación</th>
        </tr>
        <?php
        foreach ($estudiantes as $estudiante) {
            list($nombre,$nota1,$nota2,$nota3)=$estudiante;
            $media=(int)($nota1+$nota2+$nota3)/3;
        ?>

            <tr>
                <td><?php echo $nombre?></td>
                <td><?php echo $nota1 ?></td>
                <td><?php echo $nota2 ?></td>
                <td><?php echo $nota3 ?></td>
                <td><?php echo calificacionMatch($media) ?>

            </tr>
        <?php
        }
        ?>
    </table>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>