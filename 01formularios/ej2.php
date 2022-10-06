<h1>Respuesta al formulario</h1>

<?php 
    $numero=$_POST["Numero"];
    //echo "<p>$numero</p>";
    for ($i=0; $i < $numero; $i++) { 
        echo "<li>$i</li>";
    }

    
?>