<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/favicon_io/favicon.ico">
    

    <title>Cali tour 360 | Ingreso</title>
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
            width:500px;
            border-radius: 10px;
            position:relative;
            opacity:80%;
            margin: auto;
            padding-top:100px;
            padding-bottom: 100px;
            padding-left: 100px;
            padding-right: 100px;
            text-align: center;
            box-shadow: 5px 5px silver;
         }
         .envio{
            background-color: rgb(255, 6, 6);
            color:white;
            font-size:15px;
            
         }
         
         
    </style>
</head>
<body>
<div style="width:100%; padding:5px;background-color:#017F79;">
<a name=top title="Cali tour 360" href="busqueda2.php?p=3.450195,-76.538315&c=0&b=0&j=0&rd=0&cat=Cat0&a=t"><img src="imagenes/logo_texto.png" alt="Gestor de busquedas"></a>
	</div><br>
        <div class="contenedor"> 
       
        <form action="login-verify.php" method="post">
            <table class="content">
                <tr><td colspan="2"><span id="titulo">Ingreso</span></td></tr>
                <tr><td>Usuario:</td><td><input type="text" name="user"></td></tr>
                <tr><td>Pass:</td><td><input type="password" name="pass"></td></tr>
                <tr><td colspan="2" text-align="center"><br><input type="submit" class="envio" value="Ingreso"></td></tr>
                <tr><td colspan="2">
                    <?php
                        $verificar = $_GET['verify'];
                        if($verificar == "error"){
                            echo "<br>No esta autorizado para ingresar";
                        }
                    ?>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>