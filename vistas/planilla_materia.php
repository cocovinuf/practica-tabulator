<?php
    include "../conexion.php";
    session_start();
    if(empty($_SESSION["nombre"])){
    header("location:login.php");
    exit();
    }

 // Leo los parametros pasados por URL y los asigno a una variable
    $_SESSION['id_materia'] = $_GET['id_materia'];
    
    $_SESSION['nombre_materia'] = $_GET['nombre_materia'];
    $nombre_materia = $_SESSION['nombre_materia'];
   
    $_SESSION['ano_materia'] = $_GET['ano_materia'];
    $ano_materia = (int) $_GET['ano_materia'];


    //Comprobacion de que se envio un id_materia
        if (isset($_GET['id_materia'])) {
            $id_materia = (int) $_GET['id_materia'];
            echo "<h2>Materia ID: " . $id_materia . "</h2>";
        }
        if($id_materia < 1 or $id_materia >55){
            echo "<h3>ID de materia no valido</h3>";
            exit;
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ano_materia . ' ' . $nombre_materia ?></title>
</head>
<body>

<!-- TITULO DE MATERIA SELECCIONADA -->
<?php
    echo "<h1>$ano_materia º Año -  $nombre_materia </h1>"
?>


<!--                    TABULATOR               -->
<div id="tabla_profesores" ></div>

  <!-- Tabulator CSS (CDN) -->
  <link href="https://unpkg.com/tabulator-tables@6.3.1/dist/css/tabulator.min.css" rel="stylesheet">

  <!-- Tus estilos -->
  <link rel="stylesheet" href="../estilos.css">

  <!-- Tabulator JS (CDN) -->
  <script src="https://unpkg.com/tabulator-tables@6.3.1/dist/js/tabulator.min.js"></script>

  <!-- Tu JS -->
  <script src="../javascript/tabla_profesores.js" ></script>

</body>

</html>