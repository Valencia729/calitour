<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="imagenes/favicon_io/favicon.ico">
    

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
        :root {
			--arrow-bg: rgba(0, 0, 0, 0.3);
			--arrow-icon: url(https://upload.wikimedia.org/wikipedia/commons/9/9d/Caret_down_font_awesome_whitevariation.svg);
			--option-bg: white;
			--select-bg: rgb(25, 240, 255);
		  }
		  * {
			box-sizing: border-box;
		  }
		select {
			/* Reset */
			appearance: none;
			border: 0;
			outline: 0;
			font: inherit;
			/* Personalize */
			width: 150px;
			height: 25px;
			padding: 1px;
			background: var(--arrow-icon) no-repeat right 0.8em center / 1.4em,
			  linear-gradient(to left, var(--arrow-bg) 3em, white 3em);
			color: black;
			border-radius: 0.25em;
			box-shadow: 0 0 1em 0 rgba(0, 0, 0, 0.2);
			cursor: pointer;
			/* Remove IE arrow */
			&::-ms-expand {
			  display: none;
			}
			/* Remove focus outline */
			&:focus {
			  outline: none;
			}
			/* <option> colors */
			option {
			  color: inherit;
			  background-color: var(--option-bg);
			}
		  }
      input{
        border-radius: 5px;
        border:1px #555555 solid;
        padding: 5px;
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
            opacity:90%;
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
$id = $_GET['id'];
$query="SELECT * FROM puntos WHERE id_sitios = $id LIMIT 1";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		$increment_gid = $obj->gid;
        $nombre = $obj->nombre;
        $direccion = $obj->direccion;
        $latitud = $obj->latitud;
        $longitud = $obj->longitud;
        $descrip = $obj->descrip;
        $comuna = $obj->id_comuna;
        $area = $obj->area;
        $barrio = $obj->id_barrios;
        $categoria = $obj->categoria;
        $gid = $obj->gid;
        $id_sitios = $obj->id_sitios;
        $geom = $obj->geom;
        $visible = $obj->visible;

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

  <form action="update.php" method="post">
    <div id=titulo>Edición de sitio turístico</div>  <br>
    <table>
      <tr>
        <td>
          <input type=hidden name="id_sitios" value='<?php echo $id_sitios;?>'  size=3>
          <input type=hidden name="gid" value='<?php echo $gid;?>'>
          Nombre:</td>
        <td>
          <input maxlength="30" name="nombre" maxlength="30" type="text" size=50 required value="<?php echo $nombre;?>"></td>
      </tr>
      <tr>
        <td>
          Direccion:</td>
        <td><input name="direccion" maxlength="30" required value="<?php echo $direccion;?>"></td>
      </tr>
      <tr>
        <td>
          Area:</td>
        <?php
        if($area == 1){
            $area_t = "Rural";
        }
        if($area == 2){
            $area_t = "Urbano";
        }
        if($area == 3){
            $area_t = "Sin area";
        }
        ?>
        <td>
        
        <select name="area">
          <option value="<?php echo $area;?>"><?php echo $area_t;?></option>
          <option value="1">Rural</option>
          <option value="2">Urbana</option>
          <option value="3">Sin área</option>
          </select>

        </td>
      </tr>
      <tr>
        <td>Comuna: </td>
        <td>
          <select name="id_comuna">
            <option value="<?php echo $comuna;?>"><?php echo $comuna;?></option>
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
        <td>Barrio: </td>
        <td>
          <select name="id_barrios">
          <?php
              $query1="SELECT * FROM barrios where id_barrios = 311 limit 1";
              $consulta1=pg_query($conexion,$query1);
              while($obj1=pg_fetch_object($consulta1)){
                echo "<option value=".$obj1->id_barrios.">".$obj1->nombre."</option>";
              }
            ?>
            
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
        <td>Categoria: </td>
        <td>
          <?php
          if($categoria == 1){
            $categoria_t = "Cultural";
          }
          if($categoria == 2){
            $categoria_t = "Deportivo";
          }
          if($categoria == 3){
            $categoria_t = "Ecológico";
          }
          ?>
          <select name="categoria">
            <option value="<?php echo $categoria;?>"><?php echo $categoria_t;?></option>
            <option value="1">Cultural</option>
            <option value="2">Deportivo</option>
            <option value="3">Ecológico</option>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan=2>
          <br>Ubicación del sitio: <a href="clasifier.php?id=<?php echo $id_sitios;?>" title="ver panorama">Ver panorama</a><br>
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

              // Agregar una capa de mosaico (en este caso, OpenStreetMap)
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
              }).addTo(myMap);
              const marker = L.marker([<?php echo $latitud;?>, <?php echo $longitud;?>]).addTo(myMap);
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
          Descripción:<br>
          <textarea maxlength="150" name="descrip" rows="5" maxlength="150" cols="65"  required><?php echo $descrip;?></textarea>
          
        </td>
      </tr>       
      <tr>
        <td></td>
        <td style="text-align:right;">
          
            <input value="<?php echo $geom;?>" name=geom type=hidden><input value="<?php echo $visible;?>" name=visible type=hidden>
            <input type="hidden" value="1" name="tipo"><input class="envio" value="Guardar" type=submit>
            </td>
      </tr>
    </table>

  </form>
  <div class="centrado"><br><a href="list.php" title="listado de sitios">Listado de sitios</a></div>
</div>
</body>
</html>
