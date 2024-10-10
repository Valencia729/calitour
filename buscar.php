<html html lang="es">
<meta charset="UTF-8">
<link rel="shortcut icon" href="imagenes/favicon_io/favicon.ico">
<link rel="stylesheet" href="style.css" >
<style>
	body{
		overflow-x: hidden;
	}
	</style>
<head>
<title>Gestor de búsquedas - Buscar</title>
<div style="width:100%; padding:5px;background-color:#017F79;">
<a name=top title="Cali tour 360" href="busqueda2.php?p=3.450195,-76.538315&c=0&b=0&j=0&rd=0&cat=Cat0&a=t"><img src="imagenes/logo_texto.png" alt="Gestor de busquedas"></a>
	</div><br>
<center>
<table style="background-color:white; width:600px; border-radius:20px; padding:10px;">
<tr><td>
<?php
include 'conexion.php';

$termino = $_POST['search'];
$lat_1 = $_POST['lat_1'];
$long_1 = $_POST['long_1'];
echo "<h2>Resultados para: <i>".$termino."</i></h2><hr>";
$query="SELECT * FROM puntos WHERE nombre LIKE '%$termino%'";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		echo "<li><a style='text-decoration:none;' title='Ver informacion del sitio turistico' href='clasifier.php?id=".$obj->id_sitios."&lat=".$lat_1."&long=".$long_1."'>".$obj->nombre."</a></li>";
	}

?>
</td></tr>
</table>
</center>
<div style="position:absolute; right:400px; padding:5px;">
<a href="busqueda2.php?p=3.450195,-76.538315&c=0&b=0&j=0&rd=0&cat=Cat0&a=t" class="controles_e" style="font-size:14px;">Nueva búsqueda</a> &nbsp; 	
<a href="#top" class=controles_e>Arriba</a></div>
</head>
<body style="background-color:#EEEEEE;">
</body>
</html>
