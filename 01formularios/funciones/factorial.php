<?php

 function factorial(int $num)
{
    $factorial = 1;
    
    for ($i=1; $i<=$num; $i++)
    {
        $factorial *= $i;
    }
    
    return "El factorial de $num es $factorial";
}
?>