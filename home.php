<?php
session_start();
if(empty($_SESSION["id_usuario"])){
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
<h2>Bienvenid@, <?php echo $_SESSION["nombre"]; ?></h2>

  <!-- Tabulator CSS (CDN) -->
  <link href="https://unpkg.com/tabulator-tables@6.3.1/dist/css/tabulator.min.css" rel="stylesheet">

  <!-- Tus estilos -->
  <link rel="stylesheet" href="estilos.css">


  <h1>Alumnos</h1>
  <br>
  <a href="controlador/controlador_cerrar_sesion.php" value="Cerrar Sesion">Cerrar Sesion</a>
  <br><br>
 

  
  <div id="tabla-alumnos"></div>




  <!-- Tabulator JS (CDN) -->
  <script src="https://unpkg.com/tabulator-tables@6.3.1/dist/js/tabulator.min.js"></script>

  <!-- Tu JS -->
  <script src="tabla.js"></script>


</body>
</html>

