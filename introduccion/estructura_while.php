<h1>Estructura while</h1>

<ul>
<?php
 $i=1;
 while ($i <= 10) {
    echo "<p>$i</p>";
    $i++;
 }
 $n=10;
 while ($n < 100) {
    if($n%3==0 && $n%5==0)
    echo "<li>$n</li>";
    $n++;
 }
 
?>
</ul>