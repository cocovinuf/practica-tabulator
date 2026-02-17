<!--                    INICIO DE SESION                  -->
<?php
    session_start();
    if(empty($_SESSION["nombre"])){
    header("location:login.php");
    exit();
    }

    
?>
<!--                    PARTE HTML                -->

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../javascript/main.js"></script>
        <script src='../javascript/mostrar_mensaje.js'></script>
        <link href="../estilos/estilos_home_admin.css" rel="stylesheet">
        <title>Administrador</title>
    </head>
    <body>

<?php
include "../conexion.php";
include "../funciones_php/funciones.php"
?>
    <h1>Administrador: <?php echo $_SESSION["nombre"]; ?></h1>

    <h2>Herramientas</h2>



<!--                    CERRAR SESION                -->
<a class="boton-cerrar-sesion" href="../controlador/controlador_cerrar_sesion.php" value="Cerrar Sesion">Cerrar Sesion</a>

<br><br><br><br>

<!--                    TABULATOR               -->


<form method="POST">
    <label>Sede</label>
    <?php selectorSede($conexion,'id_sede_libretas'); ?><br><br>
    <label>Año</label>
    <?php selectorAno($conexion,'ano_libretas'); ?>
    <input type="submit" name="btn_solicitar_curso_libreta" value="Elegir curso">
</form>

<?php
    if(isset($_POST['btn_solicitar_curso_libreta'])){
        if(!empty($_POST['id_sede_libretas']) AND !empty($_POST['ano_libretas'])){
            $id_sede = $_POST['id_sede_libretas'];
            $ano = $_POST['ano_libretas'];
            selectorAlumno($conexion,'nombre_alumno_libreta', $id_sede, $ano);   
            echo
            "</form>
            <br><br>
            <form method='POST'>
            <input type='button' id='btn_solicitar_libreta' value='Solicitar Libreta'>  
            </form>";
        }
    }    
?>

<h3>Tabla de libretas</h3>
  <div id="tabla_libretas"></div>

  <!-- Tabulator CSS (CDN) -->
  <link href="https://unpkg.com/tabulator-tables@6.3.1/dist/css/tabulator.min.css" rel="stylesheet">

  <!-- Tabulator JS (CDN) -->
  <script src="https://unpkg.com/tabulator-tables@6.3.1/dist/js/tabulator.min.js"></script>

  <!-- JS -->
<script src="../javascript/tabla_libretas.js"></script>








