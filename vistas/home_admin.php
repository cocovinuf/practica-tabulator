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


<h2><a href="generador_libretas.php">Ir al generador de libretas</a></h2>
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


<!--                    ELIMINAR ALUMNO                 -->
<div class="caja-herramientas-alumno">
    <h4>Eliminar alumno de la lista</h4>
        <form method="post" name="eliminar_alumno">
            <label class="etiquetas-herramientas" for="dni_alumno_elim">Dni del alumno a eliminar: </label>
            <input class="etiquetas-herramientas" type="int" placeholder="Dni" name="dni_alumno_elim"><br>
            <input  type="submit" value="Eliminar alumno" name="btn_elim_alumno"><br><br>
        </form>

        <?php
        include "../controlador/controlador_eliminar_alumno.php";
        ?>
</div>

<!--                    INSCRIBIR ALUMNO                 -->
<div class="caja-herramientas-alumno">
    <h4>Inscribir alumno a materia</h4>
    <form method = "POST">
        <input type="text" placeholder="DNI del alumno" name="dni_alumno_inscribir">
       <br>

       <?php
       selectorMaterias ($conexion , 'id_materia_inscribir');
       ?>

        <br><br>
        <input type="submit" name="btn_inscribir_alumno" value="Inscribir alumno">
    </form>

        <?php
        include "../controlador/controlador_inscribir_alumno.php";
        ?>

</div>

<!--                    ELIMINAR INSCRIPCION               -->
<div class="caja-herramientas-alumno">
    <h4>Eliminar inscripción de alumno a materia</h4>
    <form method="POST">
        <input type="text" placeholder="DNI del alumno" name="dni_alumno_elim_insc"><br>
        <?php
        selectorMaterias ($conexion , 'id_materia_elim_insc'); 
        ?>
        <br><br>
        <input type="submit" name="btn_eliminar_inscripcion" value="Eliminar inscripción">    
    </form>

    <?php
        include "../controlador/controlador_eliminar_inscripcion.php";
    ?>
</div>
    
<!--                    ACTIVAR/DESACTIVAR EDICION DE NOTAS                 -->
<div class="caja-herramientas-alumno">
    <h4>Edicion de notas en planillas para profesores y tutores (AUN NO FUNCIONA)</h4>
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
  <div id="tabla_admin"></div>

<h3>Tabla de libretas</h3>
  <div id="tabla_libretas"></div>

  <!-- Tabulator CSS (CDN) -->
  <link href="https://unpkg.com/tabulator-tables@6.3.1/dist/css/tabulator.min.css" rel="stylesheet">

  <!-- Tabulator JS (CDN) -->
  <script src="https://unpkg.com/tabulator-tables@6.3.1/dist/js/tabulator.min.js"></script>

  <!-- JS -->
<script src="../javascript/tabla_admin.js"></script>
<script src="../javascript/tabla_libretas.js"></script>























</body>

</html>