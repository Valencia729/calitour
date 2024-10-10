<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="imagenes/favicon_io/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cali tour 360</title>
    <style>
        body{
            overflow-x: hidden;
            background-image: url('imagenes/fondo_login.jpg');
            width:auto;
            background-repeat: no-repeat;
            background-position-x: center;
            background-size: cover;
            margin:auto;
        }
        
        .contenedor{
            position:relative;
            top:100px;
        }
        #titulo{
            font-size:40px;
            text-align: center;
            margin: auto;

        }
        .content{
            
            background-color: white;
            width:800px;
            border-radius: 10px;
            position:relative;
            opacity:80%;
            margin: auto;
            padding-top:50px;
            padding-bottom: 100px;
            padding-left: 100px;
            padding-right: 100px;

            box-shadow: 5px 5px silver;
         }
         .envio{
            background-color: rgb(255, 6, 6);
            color:white;
            font-size:15px;
            
         }
         
         
    </style>
<?php
include 'conexion.php';
$query="SELECT * FROM puntos ORDER BY id_sitios DESC LIMIT 1";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		$increment = $obj->id_sitios;

	};
$query="SELECT * FROM puntos ORDER BY gid DESC LIMIT 1";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		$increment_gid = $obj->gid;

	};
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
<style>
  #map {
    height: 400px;
	  width:100%;
	}
</style>
</head>
<body>

<div style="width:100%; padding:5px;background-color:#017F79;">
<a name=top title="Cali tour 360" href="busqueda2.php?p=3.450195,-76.538315&c=0&b=0&j=0&rd=0&cat=Cat0&a=t"><img src="imagenes/logo_texto.png" alt="Gestor de busquedas"></a>
	</div>
        <div class="content">

  <form action="new.php" method="post" enctype="multipart/form-data" >
    <div id=titulo>Nuevo sitio turístico</div>  <br>
    <table>
      <tr>
        <td>Imagen 360:</td>
        <td><input type="file" name="foto360" accept=".jpg" required> Sólo de admite formato jpg</td>
      </tr>
      <tr>
        <td>Imagen miniatura:</td>
        <td><input type="file" name="mini" accept=".jpg" required> Sólo de admite formato jpg</td>
      </tr>
      
      <tr>
        <td>
          <input type=hidden name="id_sitios" value='<?php echo $increment + 1;?>'  size=3>
          <input type=hidden name="gid" value='<?php echo $increment_gid + 1;?>'  size=3>
          Nombre:</td>
        <td>
          <input name="nombre" type="text" size=50 required></td>
      </tr>
      <tr>
        <td>
          Direccion:</td>
        <td><input name="direccion" required><input type="hidden" name="visible" value="no"></td>
      </tr>
      <tr>
        <td>
          Area:</td>
        <td><select name="area">
          <option value="1">Rural</option>
          <option value="2">Urbana</option>
          <option value="3">Sin área</option>
          </select>

        </td>
      </tr>
      <tr>
        <td>Comuna:</td>
        <td>
          <select name="id_comuna">
            <?php
              $query="SELECT id_comuna FROM comunas ORDER BY id_comuna";
              $consulta=pg_query($conexion,$query);
              while($obj=pg_fetch_object($consulta)){
                echo "<option value='".$obj->id_comuna."'>".$obj->id_comuna."</option>";
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Barrio:</td>
        <td>
          <select name="id_barrios">
            <?php
              $query="SELECT * FROM barrios ORDER BY nombre";
              $consulta=pg_query($conexion,$query);
              while($obj=pg_fetch_object($consulta)){
                echo "<option value='".$obj->id_barrios."'>".$obj->nombre."</option>";
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Categoria:</td>
        <td>
          <select name="categoria">
            <option value="1">Cultural</option>
            <option value="2">Deportivo</option>
            <option value="3">Ecológico</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan=2>
          <br>Haga click sobre la ubicación del sitio:<br>
          <div id="map"></div>
          <label for="latitude">Latitud:</label>
          <input type="text" id="latitude" readonly name="latitud">

          <label for="longitude">Longitud:</label>
          <input type="text" id="longitude" readonly name="longitud">


          <script>
              // Coordenadas de Cali, Valle del Cauca, Colombia
              var caliCoordinates = [3.4516, -76.5320];

              // Crear el mapa y centrarlo en Cali
              var myMap = L.map('map').setView(caliCoordinates, 13);

              // Agregar una capa de mosaico (en este caso, OpenStreetMap)
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
              }).addTo(myMap);

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
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Descripción<br>
          <textarea name="descrip" rows="5" cols="65"  required></textarea>
          
        </td>
      </tr>       
      <tr>
        <td></td>
        <td style="text-align:right;">
          
            <input value="01040000202B0C00000100000001010000002914A674632A30411C473E9969432A41" name=geom type=hidden>
            <label><input type="checkbox" required>Acepto la politica de funcionamiento del sitio </label><input type="hidden" value="1" name="tipo"><input class="envio" value="Guardar" type=submit>
            </td>
      </tr>
      <tr>
        <td colspan="2"><div class="centrado"><a class="controles_e" href="list.php" title="listado de sitios">Listado de sitios</a></div></td>
      </tr>
    </table>

  </form>
</div>
</body>
</html>
