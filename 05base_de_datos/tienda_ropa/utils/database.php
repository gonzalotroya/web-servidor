<?php
$servidor='localhost';
$usuario='newuser';
$contrasena='newuser';
$base_de_datos='db_tienda_ropa';

$conexion= new mysqli($servidor,$usuario,$contrasena,$base_de_datos) or die("Error en la conexion");

?>
