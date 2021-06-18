<?php

$host='localhost';
$userMySQL ='root' ;
$passwordMySQL= '';
$bbdd='webmaster2021';

@$conexion = mysqli_connect($host,$userMySQL,$passwordMySQL,$bbdd) or exit("Error en la conexion."); //tambien podemos usar die()

?>