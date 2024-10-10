<?php
    $usuario = $_POST['user'];
    $pass = $_POST['pass'];

    if($usuario == "univalle" and $pass == "univalle"){
        header("Location: admin.php");
        }else{
            header("location: login.php?verify=error");
        }
?>