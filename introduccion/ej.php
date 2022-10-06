<h1>Cosas </h1>
<?php
//echo "<p>ej1</p>";


for ($i=0; $i <=10; $i++) { 
    $p=rand(0,10);
    if ($i%2==0) {
        echo "<li>$p es par</li>";
    }else {
        echo "<li>$p no es par</li>";
    }
}
//ej2
echo"[";
$string="";
for ($i=3; $i <=30 ; $i+=3) {
    $string=$string . $i . ",";
}
$string=substr($string,0,strlen($string)-1);
echo $string;
echo"]";
?>