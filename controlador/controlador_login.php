<?php

include "conexion.php";

session_start();

if(!empty($_POST["btn_ingresar"])) {

    if(!empty($_POST["usuario"]) and !empty($_POST["contrasena"])) {
        
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $sql = $conexion -> query("select * from usuarios where dni_usuario = '$usuario' and contrasena_usuario = '$contrasena'");

        if($datos = $sql -> fetch_object()){
            $_SESSION["id"] = $datos -> id_usuario;
            $_SESSION["nombre"] = $datos -> nombre_usuario;
            $_SESSION["dni"] = $datos -> dni_usuario;
            header("Location: home.php");}else{
                echo "Usuario o contraseña incorrectos";}
    
    
    
    }else{echo "Ingrese todos los datos";}


    }  


?>