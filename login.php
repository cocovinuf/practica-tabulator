<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 



<h2>Ingresar a su usuario</h2>

<?php
include "conexion.php";
include "controlador/controlador_login.php";
?>

<form method="post">

<input type="text" name="usuario" placeholder="Ingrese el usuario">
<input type="text" name="contrasena" placeholder="Ingrese la contraseña"> 
<br><br>
<input type="submit" name="btn_ingresar" value="Iniciar sesion"> 

</form>


</body>
</html>