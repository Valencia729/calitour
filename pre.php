<?php
$divisions = $_GET['p'];
$division = explode(",", $divisions);
$latitud = $division[0];
$longitud = $division[1];
$cat = $_GET['cat'];
include 'conexion.php';




header ("Location: busqueda2.php?p=".$latitud.",".$longitud."&c=0&b=0&j=0&rd=0&cat=".$cat."&a=t");
?>