<?php
function esPrimo($numero)
{
    if (!is_numeric($numero))
        return false;

    for ($i = 2; $i < $numero; $i++) {
        if (($numero % $i) == 0) {
            return false;
        }
    }
    return true;
}
function depurar($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
?>
