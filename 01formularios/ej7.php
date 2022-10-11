<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej</title>
    <link rel="stylesheet" href="estilo.css">

</head>
<body>
<form action="ej7.php" method="post">
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
    
    <input type="submit" value="Enviar">

</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
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
?>
</body>
</html>