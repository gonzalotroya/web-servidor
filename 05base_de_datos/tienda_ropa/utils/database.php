<?php
$servidor='localhost';
$usuario='root';
$contrasena='';
$base_de_datos='db_tienda_ropa';

$conexion= new mysqli($servidor,$usuario,$contrasena,$base_de_datos) or die("Error en la conexion");

?>
