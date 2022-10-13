<h1>Respuesta al formulario</h1>

<?php 
    $numero=$_POST["numero"];
    //echo "<p>$numero</p>";
    for ($i=0; $i < $numero; $i++) { 
        echo "<li>$i</li>";
    }

    require 'footer.php'

?>