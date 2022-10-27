<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
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
</body>
</html>