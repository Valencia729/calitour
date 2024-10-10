<html html lang="es">
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<head>
<title>Cali tour 360</title>


</head>
<body topmargin="0">
<div class="centrado">
    <div class=titulo_accesorio>procesando...</div><br><br>
<?php
$db = pg_connect("host=localhost dbname=sig360 user=postgres password=valencia");
$query = "UPDATE puntos set gid ='$_POST[gid]', id_sitios ='$_POST[id_sitios]', nombre='$_POST[nombre]',latitud='$_POST[latitud]',longitud='$_POST[longitud]',descrip='$_POST[descrip]',tipo='$_POST[tipo]',id_barrios='$_POST[id_barrios]',id_comuna='$_POST[id_comuna]',area='$_POST[area]',categoria='$_POST[categoria]',geom='$_POST[geom]',direccion='$_POST[direccion]',visible='$_POST[visible]' where id_sitios='$_POST[id_sitios]'";
$result = pg_query($query); 

?>
</div>
<?php

if (isset($_COOKIE['longitud'])) {
    $latitud = $_COOKIE['latitud'];
    $longitud = $_COOKIE['longitud'];
   
} else {
    echo "Se presento un error: espere...<meta http-equiv=\"refresh\" content=\"0; URL=categorias.html\" />";
} 
$id = $_POST['id_sitios'];
header ("Location: actualizacion.php?id=".$id."");
?>
</body>
</html>
