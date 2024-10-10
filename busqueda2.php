<!-- Carga el esquema de programacion inicial html:5 -->
<!-- define el idioma de la pagina -->
<html html lang="es">
<!-- define el tipo de codificacion -->
<meta charset="UTF-8">
<head>
 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WZGLXTN40X"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WZGLXTN40X');
</script>
<!-- llama al icono de la ventana -->
<link rel="shortcut icon" href="imagenes/favicon_io/favicon.ico">
<!-- llama a las hojas de estilos y javascrpt propia y de leaflet necesarias para el funcionamiento del mapa base -->
<link rel="stylesheet" href="leaflet.css" >
<link rel="stylesheet" href="style.css" >
<script src="leaflet3.js"></script>
<!-- llama a la api de google para extraer el tipo de letra poppins -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<!-- indica el nombre de la ventana	 -->
<title>Gestor de búsquedas | Inicio </title>
<!-- javascript para cada uno de los 6 menus que permite el desplegue del selector al click sobre la imagen  -->
<!-- inicio de php- este segmento llama las variables que se van a utilizar a lo largo del codigo -->
<?php
include 'conexion.php';
if (isset($_GET['p'])) {
    // Obtén el valor de la variable 'usuario' de la URL
    $divisions = $_GET['p'];

    $division = explode(",", $divisions);
    // asigna la primera porcion antes de la coma para lat y la seguna para la long
    $latitud = $division[0];
    $longitud = $division[1];

    
    setcookie('latitud', $latitud, time() + 3600, '/'); // Cookie válida por 1 hora
    setcookie('longitud', $longitud, time() + 3600, '/'); // Cookie válida por 1 hora
}


$barrios = $_GET['b'];
$comunas = $_GET['c'];
$tipos = $_GET['j'];
$radio = $_GET['rd'];
$categoria = $_GET['cat'];
$area = $_GET['a'];
// comparacion para el radio: si es igual a cero entonces crea un buffer de 10000m para contener todos los sitios turisticos de cali
if($radio == "0"){
	$opacity = "0";
	$fill ="0";
	$color = "transparent";
	$buffer = "ST_buffer(ST_GeomFromText('POINT(".$longitud." ".$latitud.")', 4326)::GEOGRAPHY, 1000000)::GEOMETRY";
} else{
	// aplica un estilo de linea 0.5 grosor color de relleno, y borde
	$opacity = "0.5";
	$fill = "#f03";
	$color = "red";
	// crea un buffer al punto de ubicacion del usuario mediante st_buffer con el radio de la variable seleccionada
	$buffer = "ST_Buffer(ST_GeomFromText('POINT(".$longitud." ".$latitud.")', 4326)::GEOGRAPHY, $radio)::GEOMETRY";
}
?>
<script>
// cambia el atributo del estilo display a none para ocultarlo y block para visualarlo (intercambia al hacer click por el evento onclick)
function menu0() {
    var x = document.getElementById("menu0");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function menuc() {
    var x = document.getElementById("menuc");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// menu 1
function menu1() {
    var x = document.getElementById("menu1");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// menu 2
function menu2() {
    var x = document.getElementById("menu2");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// menu 3
function menu3() {
    var x = document.getElementById("menu3");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// menu 4
function menu4() {
    var x = document.getElementById("menu4");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// menu 5
function menu5() {
    var x = document.getElementById("menu5");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
// menu 6
function menu6() {
    var x = document.getElementById("menu6");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<!-- la clase wrapper (padre) indica el estilo y la disposicion del contenido que se muestra en pantalla // convierte la pantalla en una grilla y ubica el contenido (hijo) en cada lugar -->
<div class=wrapper>
<!-- la capa header define la disposicion de la fila 1 columna 1, donde esta el logo -->
<div class=header>
<!-- inserta el logo y un titulo descriptivo -->
<a href="consulta.html" title="Sistema de información geográfico 360 turístico de Cali"><img src='imagenes/logo.png' class=logo alt="Gestor de búsqueda para sitios turísticos de Cali"></a>
<img src='imagenes/logo_texto_2.png' class=categoria alt="SigWeb360">
<a href="javascript: history.go(-1)" title="Ir atrás">
	<img src="imagenes/back.png" class="categoria_t_2" alt="Atrás" width="30px"></a>
</div>
<!-- la capa results title define la disposicion de la fila 1 columna 2, donde esta el titulo RESULTADOS -->
<div class=results_title>ENG | ESP
<div id="google_translate_element" class="google"></div>
<div class="buscador">
		<form action=buscar.php method=post>
			<input name=search type="text" class="input_buscador" placeholder="Buscar por nombre"><input name="lat_1" type=hidden value="<?php echo $latitud;?>"><input value="<?php echo $longitud;?>" type=hidden name="long_1"><input class="boton_buscador" value="Ir" type=submit>
		</form>
		
	</div>
<script type="text/javascript">
function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ca,eu,gl,en,fr,it,pt,de', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
        }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<br><a href="consulta.html" class="enlace" title="Carmbiar ubicación">Cambiar ubicación</a> | <a href="http://www.calitour360.com" class="enlace" title="Geoportal">Geoportal</a> | <a href="login.php?verify" class="enlace" title="Agregar nuevo sitio turístico"><img src=imagenes/agregar.png height=15px> Agregar sitio</a>

</div>

<!-- contenido del menu1 - comuna -->
 <?php
 	$area=$_GET["a"];
	if($area == "t"){
		$area_t = "Todas";
        $area = $_GET["a"];
        $control_a = "";
	}
	if($area == "u"){
		$area_t = "Area urbana";
        $area = $_GET["a"];
	}
	if($area == "r"){
		$area_t = "Area rural";
        $area = $_GET["a"];
        $comunas = "0";
	}


 	$comuna=$_GET["c"];
	if($comuna == "0"){
		$comuna_t = "Todas";
	}else{
		$comuna_t = $comunas;
	}
;?>
<div id=menu0 class=menu_box0><b>Área:</b><br>
<select onChange="self.location =this.options[this.selectedIndex].value">
<option value="#" selected="selected"><?php echo $area_t;?></option>
<!-- conexion y connsulta para invocar las comunas en el desplegable del menu 1 -->
<option value="busqueda2.php?p=<?php echo $divisions;?>&c=<?php echo $comunas;?>&b=0&j=<?php echo $tipos;?>&rd=<?php echo $radio;?>&cat=<?php echo $categoria;?>&a=u" target='_blank'>Area urbana</option>
<option value="busqueda2.php?p=<?php echo $divisions;?>&c=0&b=0&j=<?php echo $tipos;?>&rd=<?php echo $radio;?>&cat=<?php echo $categoria;?>&a=r" target='_blank'>Area rural</option>
<option value="busqueda2.php?p=<?php echo $divisions;?>&c=<?php echo $comunas;?>&b=0&j=<?php echo $tipos;?>&rd=<?php echo $radio;?>&cat=<?php echo $categoria;?>&a=t" target='_blank'>Todas</option>

</select>
</div>
<div id=menuc class=menu_boxc><b>Categoria:</b><br>
<?php
if($categoria == "Cat1"){
    $categoria_t = "Cultural";
}
if($categoria == "Cat2"){
    $categoria_t = "Deportivo";
}
if($categoria == "Cat3"){
    $categoria_t = "Ecológico";
}
if($categoria == "Cat0"){
    $categoria_t = "Todas";
}
;?>
<select onChange="self.location =this.options[this.selectedIndex].value">
<option value="#" selected="selected"><?php echo $categoria_t;?></option>
<!-- conexion y connsulta para invocar las comunas en el desplegable del menu 1 -->
<option value="busqueda2.php?p=<?php echo $divisions;?>&c=<?php echo $comunas;?>&b=0&j=<?php echo $tipos;?>&rd=<?php echo $radio;?>&cat=Cat1&a=<?php echo $area;?>" target='_blank'>Cultural</option>
<option value="busqueda2.php?p=<?php echo $divisions;?>&c=0&b=0&j=<?php echo $tipos;?>&rd=<?php echo $radio;?>&cat=Cat2&a=<?php echo $area;?>" target='_blank'>Deportivo</option>
<option value="busqueda2.php?p=<?php echo $divisions;?>&c=<?php echo $comunas;?>&b=0&j=<?php echo $tipos;?>&rd=<?php echo $radio;?>&cat=Cat3&a=<?php echo $area;?>" target='_blank'>Ecológico</option>
<option value="busqueda2.php?p=<?php echo $divisions;?>&c=<?php echo $comunas;?>&b=0&j=<?php echo $tipos;?>&rd=<?php echo $radio;?>&cat=Cat0&a=<?php echo $area;?>" target='_blank'>Todas</option>


</select>
</div>
<?php 
    if($area == "r"){
        $control_a = 'disabled';
    }else{
        $control_a = "";
    }
;?>
<div id=menu1 class=menu_box1><b>Comuna:</b><br>
<select <?php echo $control_a;?> onChange="self.location =this.options[this.selectedIndex].value">
<option value="#" selected="selected"><?php echo $comuna_t;?></option>
<!-- conexion y connsulta para invocar las comunas en el desplegable del menu 1 -->
<?php
$query="SELECT id_comuna FROM comunas order by id_comuna";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		echo "<option value='busqueda2.php?p=".$divisions."&c=".$obj->id_comuna."&b=0&j=".$tipos."&rd=".$radio."&cat=".$categoria."&a=".$area."' target='_blank'>".$obj->id_comuna."</option>";
	}
?>
<option value='busqueda2.php?p=<?php echo $divisions;?>&c=0&b=0&j=0&rd=0&cat=<?php echo $categoria;?>&a=<?php echo $area;?>' target='_blank'>Todas</option>
</select>
</div>
<!-- contenido del menu2  - barrio -->
<div id=menu2 class=menu_box2><b>Barrio:</b><br>
 <select <?php echo $control_a;?> onChange="self.location =this.options[this.selectedIndex].value">
<!-- conexion y connsulta para invocar los barrios en el desplegable del menu 2 -->
<?php
$barrios = $_GET['b'];
if($barrios != '0'){
	// consulta para llenar la lista desplegable con los nombres de los barrios seguna la comuna seleccionada
	$query="SELECT nombre FROM barrios WHERE id_barrios = $barrios";
	$consulta=pg_query($conexion,$query);
	while($obj=pg_fetch_object($consulta)){
		echo "<option>".$obj->nombre."</option>";}
	
} else{
	// si barrios es igual a cero entonces que muestre la opcion para consultar todos los barrios
	echo "<option value='busqueda2.php'>Todos los barrios</option>";

}
?>
<!-- consulta para llamar todos los barrios de una comuna -->
<?php
$query="SELECT * FROM barrios WHERE id_comuna =$comuna";
$consulta=pg_query($conexion,$query);
{while($obj=pg_fetch_object($consulta))
		echo "<option value='busqueda2.php?p=".$divisions."&c=".$comuna."&b=".$obj->id_barrios."&j=".$tipos."&g=".$generos."&rd=".$radio."&cat=".$categoria."&a=".$area."' target='_blank'>".$obj->nombre."</option>";
	}
echo "<option value='busqueda2.php?p=".$divisions."&c=".$comunas."&b=0&j=0&rd=".$radio."'>Todos los barrios</option>";
// compara la variable tipos, si es cero entonces muestre todos los tipos si es 1 coloque publicos y 2 para privados
if($tipos == "0"){
	$tipo ="";
	$tipo_p = "0";
	$tipo_n ="Foto/Video";
	}
if($tipos == "1"){
	$tipo = "AND col.tipo = '1'";
	$tipo_p = "0";
	$tipo_n ="Fotos";
	}
if($tipos == "2"){
	$tipo = "AND col.tipo = '2'";
	$tipo_p = "0";
	$tipo_n ="Videos";
	}
if($tipos == "3"){
	$tipo = "AND col.tipo = '3'";
	$tipo_p = "0";
	$tipo_n ="Foto/Video";
	}
if($area == "t"){
    $area = "";
    $area_t = $_GET['a'];
    }
if($area == "r"){
    $area = "AND col.area = '1'";
    $area_t = $_GET['a'];
}
if($area == "u"){
    $area = "AND col.area = '2'";
    $area_t = $_GET['a'];
}
if($categoria == "Cat1"){
    $categoria = "AND col.categoria = '1'";
    $categoria_t = $_GET['cat'];
}
if($categoria == "Cat2"){
    $categoria = "AND col.categoria = '2'";
    $categoria_t = $_GET['cat'];
}
if($categoria == "Cat3"){
    $categoria = "AND col.categoria = '3'";
    $categoria_t = $_GET['cat'];
}
if($categoria == "Cat0"){
    $categoria = "";
    $categoria_t = $_GET['cat'];
}
?>
</select> 
</div>
<!-- contenido del menu3  - tipo de sitios turísticos. Este selector no hace consulta a la base, se llena manualmente -->
<div id=menu3 class=menu_box3><b>Tipo:</b>:<br>
<!-- define el evento onchage para que cada vez que se escoga un valor de la lista se refresque la pagina -->
	
<select onChange="self.location =this.options[this.selectedIndex].value">

<!-- llena la lista desplegable con las opciones anteriores segun sea el caso (1, 2 o 3) -->
<option value='busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=0&rd=".$radio."&cat=".$categoria_t."&a=".$area_t;?>'><?php echo $tipo_n;?></option>
<option value='busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=1&rd=".$radio."&cat=".$categoria_t."&a=".$area_t;?>'>Fotos</option>
<option value='busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=2&rd=".$radio."&cat=".$categoria_t."&a=".$area_t;?>'>Videos</option>
<option value='busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=0&rd=".$radio."&cat=".$categoria_t."&a=".$area_t;?>'>Foto/Video</option>
</select>

</div>
<!-- contenido del menu4  - jornada. Este selector no hace consulta a la base, se llena manualmente -->

<!-- contenido del menu6  - radio. Este selector no hace consulta a la base, se llena manualmente -->
<div id=menu6 class=menu_box4><b>Radio:</b><br>
<?php
if($radio == 0){
	$radio_t = "Sin radio";
}else{
	$radio_t = $radio;
}
?>
<select onChange="self.location =this.options[this.selectedIndex].value">
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=".$radio."&cat=".$categoria_t."&a=".$area_t;?>><?php echo $radio_t;?></option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=50&cat=".$categoria_t."&a=".$area_t;?>>50m</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=100&cat=".$categoria_t."&a=".$area_t;?>>100m</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=200&cat=".$categoria_t."&a=".$area_t;?>>200m</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=400&cat=".$categoria_t."&a=".$area_t;?>>400m</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=600&cat=".$categoria_t."&a=".$area_t;?>>600m</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=800&cat=".$categoria_t."&a=".$area_t;?>>800m</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=1000&cat=".$categoria_t."&a=".$area_t;?>>1km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=1500&cat=".$categoria_t."&a=".$area_t;?>>1.5km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=2000&cat=".$categoria_t."&a=".$area_t;?>>2Km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=2500&cat=".$categoria_t."&a=".$area_t;?>>2.5Km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=3000&cat=".$categoria_t."&a=".$area_t;?>>3Km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=3500&cat=".$categoria_t."&a=".$area_t;?>>3.5Km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=5000&cat=".$categoria_t."&a=".$area_t;?>>5Km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=10000&cat=".$categoria_t."&a=".$area_t;?>>10Km</option>
<option value=busqueda2.php?p=<?php echo $divisions."&c=".$comuna."&b=".$barrios."&j=".$tipo_p."&rd=0&cat=".$categoria_t."&a=".$area_t;?>>Sin radio</option>

</select><br><br>
<div class=centrado><a class="controles_e_comentarios" href="busqueda2.php?p=<?php echo $latitud;?>,<?php echo $longitud;?>&c=0&b=0&j=0&rd=0&cat=Cat0&a=t">Restablecer</a></div>
</div>
<!-- la capa constrols define la disposicion de la fila 2 columna 1, donde estan las funciones (cambiar ubicacion, buscar etc) -->
<div class=controles>
<!-- espacio de controles -->
</div> 
<!-- capa que carga el codigo el mapa base leaflet, se hace una consulta a la base por medio de la interseccion de las capas cargadas en postgres entre el sitios turisticos y la comuna, luego entre el sitio y barrio -->
<div id='map' class="map">
<!-- crea una interseccion entre la ubicacion del usuario usando las coordenadas y la geometria de la capa comuna para definir la id de la comuna -->
<?php
$comuna=$_GET["c"];
$comu = $comuna;
if($comu == '0'){
	$comunad = "where ST_Intersects(com.geom,ST_GeomFromText('POINT($longitud $latitud)', 4326)::GEOMETRY)";
	} else{
		$comunad ="where st_intersects(col.geom,com.geom) and col.id_comuna=".$comuna;
	}
// crea una condicional que hace una interseccion si es cero entre la geometria de la comuna y la geometria del barrio para hallar el id de barrio
if($barrios == '0'){
	$barr = "";
	} else{
		$barr = "and st_intersects(col.geom,barr.geom) and col.id_barrios=".$barrios;
	}
	
?>
<!-- javascript que carga el estilo de los icono en el mapa, el popup y el objeto maestro de la capa map -->
<script>
    var iconoBase = L.Icon.extend({
        options: {
            iconSize: [30, 40],
            iconAnchor: [10, 30],
            popupAnchor: [4, -30]
        }
    });

    var sitio = new iconoBase({ iconUrl: 'imagenes/marcadores.png' }),
        estacion = new iconoBase({ iconUrl: 'imagenes/estacion.png' }),
        marcador = new iconoBase({ iconUrl: 'imagenes/ubicacion.png' });


    const sitios = L.layerGroup();
    <?php
    $query = "SELECT distinct col.* FROM puntos as col, comunas as com, barrios as barr $comunad $barr $tipo $area $categoria  and  ST_Intersects(col.geom,$buffer) and visible = 'si'";
    $consulta = pg_query($conexion, $query);
    while ($obj = pg_fetch_object($consulta)) {
        echo "const m" . $obj->id_sitios . " = L.marker([" . $obj->latitud . "," . $obj->longitud . "], {
            icon: L.divIcon({
                className: 'custom-icon',
                html: '<div style=\"position: relative; text-align: center;\"><div style=\"width:100px; background: white; padding: 2px; border-radius: 3px; box-shadow: 1px 1px 1px teal;   \"><span class=vl>{$obj->nombre}</span></div><img src=\"imagenes/ubicacion.gif\" width=\"32\" height=\"32\"/></div>',
                iconSize: [32, 32]
            })
        }).bindPopup('<a href=clasifier.php?id=".$obj->id_sitios." title=Visitar><img width=\"300px\" height=\"200px\" src=\"imagenes/thubnails/img/".$obj->id_sitios.".jpg\"></a>').addTo(sitios);";    }
    ?>

    const estaciones = L.layerGroup();
    <?php
    $barriob = $_GET['b'];
    $query = "SELECT emio.* from estaciones_mio as emio, barrios as bar where st_intersects(bar.geom,emio.geom)";
    $consulta = pg_query($conexion, $query);
    while ($obj = pg_fetch_object($consulta)) {
        echo "const e" . $obj->gid . " = L.marker([" . $obj->latitud . "," . $obj->longitud . "], {icon: estacion}).bindPopup('Estacion: " . $obj->nombre . "').addTo(estaciones); ";
    }
    ?>

    const ubicacion1 = L.layerGroup();
    <?php echo "const ubi = L.marker([" . $latitud . "," . $longitud . "], {icon: marcador}).bindPopup('Su ubicación: " . $latitud . "," . $longitud . "').addTo(ubicacion1); "; ?>
	
    const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    const osm1 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    const map = L.map('map', {
        center: [<?php echo $latitud; ?>, <?php echo $longitud; ?>],
        zoom: 14,
        layers: [osm, sitios, ubicacion1] // Capas iniciales del mapa
    });

    const circle = L.circle([<?php echo $latitud; ?>, <?php echo $longitud; ?>], {
        color: '<?php echo $color; ?>',
        fillColor: '<?php echo $fill; ?>',
        fillOpacity: '<?php echo $opacity; ?>',
        radius: '<?php echo $radio; ?>'
    }).addTo(map).bindPopup("buffer seleccionado: <?php echo $radio; ?>m");

    const baseLayers = {
        'OpenStreetMap': osm,
        'Google satellite': osm1
    };

    const overlays = {
        'Sitios': sitios,
        'Estaciones': estaciones,
        'Ubicación': ubicacion1
    };

    const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

    function ocultar() {
        var x = document.getElementById("consulta");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

</div>
<!-- capa para la visualizacion de resultados -->
<div class=results>
<!-- consulta sql que cuenta cuantos resultados distintos arroja la aplicacion de los filtros -->
<?php
$query="SELECT count(distinct col.*) FROM puntos as col, barrios as barr, comunas as com $comunad $barr $tipo $area $categoria and ST_Intersects(col.geom,$buffer) and visible = 'si'";
$consulta=pg_query($conexion,$query);
$obj=pg_fetch_object($consulta);
	if($obj->count == 0){
		echo "<img src=imagenes/error.png>";	
	} else{
		echo "Resultados encontrados: ".$obj->count;
	}

?>
</h2>
<ul>
<!-- muestra los resultados en el lateral derecho y calcula la distancia entre la ubicacion de la persona y el sitios turisticos mas cercano mediante st_distance -->
<?php
$query="SELECT distinct col.nombre,col.id_sitios,col.tipo, cast((st_distance(ST_GeomFromText('POINT($longitud $latitud)', 4326),col.geom)*1000000) as decimal(10,2))  as distancia FROM puntos as col, comunas as com, barrios as barr $comunad $barr $tipo $area $categoria and ST_Intersects(col.geom,$buffer) and visible = 'si' group by distancia,col.id_sitios,col.nombre,col.tipo order by distancia asc";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
    
	echo "<li><a class=enlace1 href=clasifier.php?id=".$obj->id_sitios."&lat=".$latitud."&long=".$longitud." title='Ir a ".$obj->nombre."'>".$obj->nombre." <img src='imagenes/".$obj->tipo.".png' height=15px><br><img src=imagenes/thubnails/img/".$obj->id_sitios.".jpg  style=\"box-shadow: 2px 2px teal; border-radius:5px; height:120px; width: 200px;\"></a><br><br></li>";
}
?>
</ul>
</div>
<!-- pie de pagina -->
<div class=footer>
    <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.calitour360.com/" title="Comparte en Facebook"><img src="imagenes/facebook.png" height="20px"></a>
    <a href="https://api.whatsapp.com/send?text=Hola! te invito a visitar Cali tour 360 - Sistema de información geográfico turístico de Cali 360. http://www.calitour360.com/"  title="Comparte en whatsapp"><img src="imagenes/whatsapp.png" height="20px"></a>
    <a href="https://www.instagram.com/sigweb360"><img src="imagenes/instagram.png" height="20px" title="Vísitanos en instagram"></a> Sistema de información geográfico 360 - Universidad del Valle 2024 

</div>

</head>
<body topmargin="0" oncontextmenu="return false">

<!-- define el evento al hacer click sobre cada imagen boton del menu -->
<div class=menu>
<img onclick='menu1()' src=imagenes/menu1.png><br>
<img onclick='menu2()' src=imagenes/menu2.png><br>
<img onclick='menu3()' src=imagenes/menu3.png><br>
<img onclick='menu4()' src=imagenes/menu7.png><br>
<img onclick='menu6()' src=imagenes/menu6.png></div>

<!-- barra de convenciones  -->

<div class=leyenda_filtro><strong>
Convenciones:</strong> <img src=imagenes/ubicacion.gif height=15px> Sitio - <img src=imagenes/ubicacion.png height=15px> Mi ubicaci&oacute;n </div>
</body>
</html>
