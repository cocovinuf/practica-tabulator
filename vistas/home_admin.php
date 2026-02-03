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
        <link href="../estilos/estilos_home_admin.css" rel="stylesheet">
        <title>Administrador</title>
    </head>
    <body>
        
    <h1>Administrador: <?php echo $_SESSION["nombre"]; ?></h1>

    <h2>Herramientas</h2>

<!--                    AGREGAR ALUMNO                  -->
<div class="caja-herramientas-alumno">
    <h4>Agregar alumno a la lista</h4>
        <form method="post" name="agregar_alumno">
            <label class="etiquetas-herramientas" for="nombre_alumno_agg">Apellido y nombre: </label>
                <input type="text" placeholder="Apellido y nombre" name="nombre_alumno_agg"><br>

            <label class="etiquetas-herramientas" for="dni_alumno_agg">Dni: </label>
                <input type="int" placeholder="Dni" name="dni_alumno_agg"><br>


            <label class="etiquetas-herramientas">Sede: </label>
            <select name="sede_alumno_agg" >
                <option value=""></option> 
                <option value="1">Alecrin</option>
                <option value="2">Apóstoles</option>
                <option value="3">Chafariz</option>
                <option value="4">Guapoy</option>
                <option value="5">Jejy</option>
                <option value="6">Pozo Azul</option>
                <option value="7">San Ignacio</option>
                <option value="8">San Juan Bosco</option>
                <option value="9">Santa Ana</option>
                <option value="10">Tamandua</option>
            </select> <br>

            <label class="etiquetas-herramientas">Seleccione el año</label>
            <select name="ano_alumno_agg">
            <option value=""></option>
            <option value="1">1- PRIMER AÑO</option>
            <option value="2">2- SEGUNDO AÑO</option>
            <option value="3">3- TERCER AÑO</option>
            <option value="4">4- CUARTO AÑO</option>
            <option value="5">5- QUINTO AÑO</option>

            </select>

            <br>

            <input type="submit" value="Agregar alumno" name="btn_agg_alumno"><br><br>

        </form>
        <?php
        include "../controlador/controlador_agregar_alumno.php";
        ?>

</div>

<!--                    INSCRIBIR ALUMNO                 -->
<div class="caja-herramientas-alumno">
    <h4>Inscribir alumno</h4>
    <form method = "POST">
        <input type="text" placeholder="ID del alumno" name="id_alumno_inscribir">
        <select name="id_materia_inscribir">
            <option value= 55 >55 - Sociologia 5to</option>
        
        </select>
        
        <input type="submit" name="btn_inscribir_alumno" value="Inscribir alumno">
    </form>

        <?php
        include "../controlador/controlador_inscribir_alumno.php";
        ?>

</div>


<!--                    ELIMINAR ALUMNO                 -->
<div class="caja-herramientas-alumno">
    <h4>Eliminar alumno</h4>
        <form method="post" name="eliminar_alumno">
            <label class="etiquetas-herramientas" for="dni_alumno_elim">Dni del alumno a eliminar: </label>
            <input class="etiquetas-herramientas" type="int" placeholder="Dni" name="dni_alumno_elim"><br>
            <input  type="submit" value="Eliminar alumno" name="btn_elim_alumno"><br><br>
        </form>

        <?php
        include "../controlador/controlador_eliminar_alumno.php";
        ?>
</div>
<!--                    ACTIVAR/DESACTIVAR EDICION DE NOTAS                 -->

<div class="caja-herramientas-alumno">
    <h4>Edicion de notas en planillas</h4>
    <form>
        <select id ="seleccion_edicion_notas" onChange="cambiadorEstado()">
          <option value='"input"'>Activada</option>
          <option value='""'>Desactivada</option>
        </select>
    </form>
</div>
<br><br>

<!--                    CERRAR SESION                -->
<a class="boton-cerrar-sesion" href="../controlador/controlador_cerrar_sesion.php" value="Cerrar Sesion">Cerrar Sesion</a>

<br><br><br><br>

<!--                    TABULATOR               -->


<h2>Tabla admin</h2> <br>
<h3>Esta tabla muestra a todos los alumnos y todas sus notas como registros distintos, cuando se solucione la cuestion de acomodar las notas en una fila, aplicarlo aca</h3>
  <div id="tabla-alumnos"></div>

  <!-- Tabulator CSS (CDN) -->
  <link href="https://unpkg.com/tabulator-tables@6.3.1/dist/css/tabulator.min.css" rel="stylesheet">

  <!-- Tabulator JS (CDN) -->
  <script src="https://unpkg.com/tabulator-tables@6.3.1/dist/js/tabulator.min.js"></script>

  <!-- Tu JS -->
  <script src="../javascript/tabla_admin.js"></script>














</body>
</html>