<?php
//Conexión con la Base de Datos
$server = "localhost";
$user = "root";
$pass = "root";
$db = "srer";
$link = mysqli_connect($server, $user, $pass, $db) or die("Error en ". mysqli_error($link));
?>