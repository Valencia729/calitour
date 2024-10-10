<html html lang="es">
<meta charset="UTF-8">
<head>
<title>Gestor de búsquedas</title>

</head>
<body topmargin=0 bgcolor=#EEEEEE>
<center>
<div class=titulo_accesorio>Edición de registro</div>
<?php
$db = pg_connect("host=localhost dbname=proyecto_sig2 user=postgres password=valencia");
$query = "UPDATE colegios set nombre ='$_POST[nombre]', direccion ='$_POST[direccion]', capacidad='$_POST[capacidad]',comuna='$_POST[comuna]',telefono='$_POST[telefono]',correo='$_POST[correo]',jornada='$_POST[jornada]',tipo='$_POST[tipo]',latitud='$_POST[latitud]',longitud='$_POST[longitud]',inscrip='$_POST[inscrip]',nivel='$_POST[nivel]',id_barrio='$_POST[id_barrios]',clase='$_POST[clase]',id_colegio='$_POST[id_colegio]' where id_colegio='$_POST[id_colegio]'";
$result = pg_query($query); 

?>
<center><br>Registro editado correctamente
<br><br>
<i>ultimos cambios</i>
<center><table width=80%>
<?php
$conexion=pg_connect("host=localhost dbname=proyecto_sig2 user=postgres password=valencia");
$query="SELECT * FROM actualizados";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		echo "<tr><td>ID:</td><td>".$obj->id_colegio."</td><td>Nombre:</td><td>".$obj->nombre."</td></tr>";
	}
?>
</table></center>

</form>
</body>
</html>
