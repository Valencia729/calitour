<html html lang="es">
<meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<head>
<link rel="stylesheet" href="style.css">
<title>Gestor de búsquedas - Panel administrativo</title>
<style>
    #map {
      height: 400px;
	  width:100%;
    }

	.mayuscula{
		text-transform: uppercase;
	}
</style>
<form action="editar.php" method=post>
<?php
$id = $_GET["id"];
$conexion=pg_connect("host=localhost dbname=proyecto_sig2 user=postgres password=valencia");
$query="SELECT * FROM colegios where id_colegio =$id";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		$nombre = $obj->nombre;
		$direccion = $obj->direccion;
		$capacidad = $obj->capacidad;
		$comuna = $obj->comuna;
		$telefono = $obj->telefono;
		$correo = $obj->correo;
		$jornada = $obj->jornada;
		$tipo = $obj->tipo;
		$latitud = $obj->latitud;
		$longitud = $obj->longitud;
		$nivel = $obj->nivel;
		$inscrip = $obj->inscrip;

		$id_barrios = $obj->id_barrio;
		$clase = $obj->clase;
		$geom = $obj->geom;
		$id_colegio = $obj->id_colegio;

	}
?>
<?php
$conexion=pg_connect("host=localhost dbname=proyecto_sig2 user=postgres password=valencia");
$query="SELECT id_colegio FROM colegios ORDER BY id_colegio DESC LIMIT 1";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		$increment = $obj->id_colegio;

	}
?>
<center>
<div class=titulo_accesorio>Edición de registro</div><br><br>
<table>
<tr><td><input type=hidden name="id_colegio" value='<?php echo $id_colegio;?>'  size=3> Nombre:</td><td><input name="nombre" type="text" size=50 value='<?php echo $nombre;?>'></td></tr>
</td></tr><tr><td>Direccion:</td><td><input name=direccion value='<?php echo $direccion;?>'></td></tr><tr><td>Capacidad:</td><td><input name=capacidad value='<?php echo $capacidad;?>' size=5></td></tr><tr><td>Comuna:</td><td><select name="comuna"><option value='<?php echo $comuna;?>'><?php echo $comuna;?></option>  
<?php
$conexion=pg_connect("host=localhost dbname=proyecto_sig2 user=postgres password=valencia");
$query="SELECT id_comuna FROM comunas ORDER BY id_comuna";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		echo "<option value='".$obj->id_comuna."'>".$obj->id_comuna."</option>";
	}
?>
</select></td></tr><tr><td>Telefono:</td><td><input name=telefono value='<?php echo $telefono;?>'>
</td></tr><tr><td>Barrio:</td><td><select name=id_barrios>
<?php
$query="SELECT * FROM barrios where id_barrios=$id_barrios";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		echo "<option value='".$obj->id_barrios."'>".$obj->nombre."</option>";
	}
?>



<?php
$conexion=pg_connect("host=localhost dbname=proyecto_sig2 user=postgres password=valencia");
$query="SELECT * FROM barrios ORDER BY nombre";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		echo "<option value='".$obj->id_barrios."'>".$obj->nombre."</option>";
	}
?>
</select>
</td></tr><tr><td>Correo:</td><td><input name=correo value='<?php echo $correo;?>'></td></tr><tr><td>Jornada:</td><td><select name=jornada><option value='<?php echo $jornada;?>'><?php echo $jornada;?></option><option>Todas</option><option>Diurno</option><option>Nocturno</option></select></td></tr><tr><td>Genero:</td><td><select name=tipo><option value='<?php echo $tipo;?>'><?php echo $tipo;?></option><option value="Mixto">Mixto</option><option value="Masculino">Masculino</option><option value="Femenino">Femenino</option></select></td></tr><tr><td>Tipo:</td><td><select name=clase><option value='<?php echo $clase;?>'><?php echo $clase;?></option><option value="Publico">Publico</option><option value=Privado>Privado</option></select></td></tr><tr><td>Latitud:</td><td><input name="latitud" value='<?php echo $latitud;?>' size=6></td></tr><tr><td colspan=2>
<div id="map"></div>
  <label for="latitude">Latitud:</label>
  <input type="text" id="latitude" readonly name="latitud" value="<?php echo $latitud;?>">

  <label for="longitude">Longitud:</label>
  <input type="text" id="longitude" readonly name="longitud" value="<?php echo $longitud;?>">


<script>
	
    // Coordenadas de Cali, Valle del Cauca, Colombia
    var caliCoordinates = [3.4516, -76.5320];

    // Crear el mapa y centrarlo en Cali
    var myMap = L.map('map').setView(caliCoordinates, 13);


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      maxZoom: 18,
    }).addTo(myMap);
<?php	  
echo "const p45 = L.marker([".$latitud.",".$longitud."]).addTo(myMap);  ";
?>
    // Variables para almacenar las coordenadas
    var clickedCoordinates = null;
    var latitudeInput = document.getElementById('latitude');
    var longitudeInput = document.getElementById('longitude');

    // Función para manejar el evento de clic en el mapa
    function onMapClick(e) {
      // Actualizar las coordenadas
      clickedCoordinates = e.latlng;

      // Mostrar las coordenadas en los campos de entrada
      latitudeInput.value = clickedCoordinates.lat.toFixed(6);
      longitudeInput.value = clickedCoordinates.lng.toFixed(6);

      // Eliminar marcadores previos (si los hay)
      myMap.eachLayer(function (layer) {
        if (layer instanceof L.Marker) {
          myMap.removeLayer(layer);
        }
      });

      // Colocar un marcador en la posición del clic
      L.marker(clickedCoordinates).addTo(myMap);
    }

    // Asociar el evento de clic en el mapa a la función onMapClick
    myMap.on('click', onMapClick);
  </script>	
</td></tr><tr><td>Fecha inscripciones:</td><td><input name="inscrip" value='<?php echo $inscrip;?>'></td></tr><tr><td>Nivel:</td><td><select name=nivel><option  value='<?php echo $nivel;?>'><?php echo $nivel;?></option><option>Primaria</option><option>Secundaria</option><option>Primaria y secundaria</option></select><input  value='<?php echo $geom;?>' name=geom type=hidden></td></tr>
<tr><td></td><td align="right"><br><input class=continuar value="Actualizar colegio en la base Postgres" type=submit></td></tr>
</table>
</center>
</form>
</head>
<body>
</body>
</html>
