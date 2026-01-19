<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>¡Funciono!</h1>

<?php

if (isset($_GET['id_materia'])) {
    $id_materia = (int) $_GET['id_materia'];
    echo "<h2>Materia ID: " . $id_materia . "</h2>";
}

if($id_materia < 1 or $id_materia >55){
    echo "<h3>ID de materia no valido</h3>";
    exit;
}

?>




<div id="tabla_profesores"></div>

  <!-- Tabulator CSS (CDN) -->
  <link href="https://unpkg.com/tabulator-tables@6.3.1/dist/css/tabulator.min.css" rel="stylesheet">

  <!-- Tus estilos -->
  <link rel="stylesheet" href="../estilos.css">

  <!-- Tabulator JS (CDN) -->
  <script src="https://unpkg.com/tabulator-tables@6.3.1/dist/js/tabulator.min.js"></script>

  <!-- Tu JS -->
  <script src="../javascript/tabla_profesores.js"></script>

</body>
</html>