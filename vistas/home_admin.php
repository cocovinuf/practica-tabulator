<?php
    session_start();
    if(empty($_SESSION["id_usuario"])){
    header("location:login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
    
<h1>Esta es la vista de administrador</h1>

<h2>Herramientas</h2>

<h3>Agregar alumno</h3>
<form method="post" name="agregar_alumno">
<input type="text" placeholder="Apellido y nombre" name="nombre_alumno_agg"><br>
<input type="int" placeholder="Dni" name="dni_alumno_agg"><br>
<label>Seleccione una sede</label>
<select name="sede_alumno_agg" >
    <!-- <option value="">Seleccione una sede</option> -->
    <option value=1>Alecrin</option>
    <option value="2">Apóstoles</option>
    <option value="3">Chafariz</option>
    <option value="4">Guapoy</option>
    <option value="5">Jejy</option>
    <option value="6">Pozo Azul</option>
    <option value="7">San Ignacio</option>
    <option value="8">San Juan Bosco</option>
    <option value="9">Santa Ana</option>
    <option value="10">Tamandua</option>
</select><br>

<input type="text" placeholder="Año" name="ano_alumno_agg"><br>
<input type="submit" value="Agregar alumno" name="btn_agg_alumno"><br><br>
</form>

<?php
include "../controlador/controlador_agregar_alumno.php";

?>





<h3>Eliminar alumno</h3>
<input type="submit" value="Eliminar alumno">


<br><br>
<a href="../controlador/controlador_cerrar_sesion.php" value="Cerrar Sesion">Cerrar Sesion</a>


<br><br><br><br>

  <div id="tabla-alumnos"></div>


  <!-- Tabulator CSS (CDN) -->
  <link href="https://unpkg.com/tabulator-tables@6.3.1/dist/css/tabulator.min.css" rel="stylesheet">

  <!-- Tus estilos -->
  <link rel="stylesheet" href="../estilos.css">

  <!-- Tabulator JS (CDN) -->
  <script src="https://unpkg.com/tabulator-tables@6.3.1/dist/js/tabulator.min.js"></script>

  <!-- Tu JS -->
  <script src="../tabla.js"></script>


</body>
</html>