<?php
$latitud = $_GET['latitud'];
$longitud = $_GET['longitud'];
$categoria = $_GET['categoria'];
include 'conexion.php';


header ("Location: busqueda2.php?p=".$latitud.",".$longitud."&c=0&b=0&j=0&rd=0&cat=".$categoria."&a=t");
?>