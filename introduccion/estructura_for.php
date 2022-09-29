<h1>Estructura for</h1>

<ul>
<?php
 $i=1;
 for ($i=1; $i <= 10; $i++) { 
    echo "<p>$i</p>";
 }
 $a=5;
 for ($a=1; $a <= 50; $a++) { 
    if($a%5==0){
    echo "<p>$a</p>";}
 }
$b=rand(1,10);
$c=rand(11,20);
for ($i=$b; $i <= $c; $i++) { 
    echo "<li>$i</li>";
 }
?>
</ul>