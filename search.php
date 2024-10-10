<html html lang="es">
<meta charset="UTF-8">
<head>
    <?php
    $lat_1 = $_GET['lat'];
    $long_1 = $_GET['long'];
    ?>
<link rel="stylesheet" href="style.css">
<title>Gestor de búsquedas - Buscar</title>
<br><br><br><br><center>
<table>
<tr><td><h2><center>Búsqueda por nombre</center></h2>
<form action=buscar.php method=post>
Buscar <input name=lat_1 value="<?php echo $lat_1;?>" type="hidden"><input name=long_1 value="<?php echo $long_1;?>"  type="hidden"><input name=search><input value="Buscar colegio" type=submit>
</form>
</td></tr>
</table>
</center>
</head>
<body>
</body>
</html>
