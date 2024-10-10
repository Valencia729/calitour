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
			height: 600px;

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

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
</head>
<body>

<div style="width:100%; padding:5px;background-color:#017F79;">
<a name=top title="Cali tour 360" href="busqueda2.php?p=3.450195,-76.538315&c=0&b=0&j=0&rd=0&cat=Cat0&a=t"><img src="imagenes/logo_texto.png" alt="Gestor de busquedas"></a>
	</div>
<div class="content">
<?php
$id = $_GET["id"];
$query="delete from puntos where id_sitios=$id";
$consulta=pg_query($conexion,$query);
while($obj=pg_fetch_object($consulta)){
		echo "<br><br><div class=centrado id=titulo>Borrado</div>";
	}
?>
<br>
<div class=centrado><h2>Registro borrado</h2><br><a href="list.php" title="Listado de sitios">Listado de sitios</a> !

    <a href="admin.php" title="Nuevo sitio">Agregar nuevo sitio</a> !
</div>
</div>
</body>
</html>
