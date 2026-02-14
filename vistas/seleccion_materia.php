<?php
    include "../conexion.php";
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
    <link href="../estilos/estilos_seleccion_materia.css" rel="stylesheet">
    <script src="../javascript/mostrar_mensaje.js"></script>
    <title>Materias</title>
</head>
<body>
    


<h2>Bienvenid@, <?php echo $_SESSION["nombre"]; ?></h2>


<h3>Materias:</h3>
<!--                    CAJA DEL SELECTOR DE MATERIAS                 -->
<div class="caja-selector-materias">
    <?php
        $consulta_materias = "select * from materias where id_profesor = '$_SESSION[id_usuario]'";
        $resultado_materias = mysqli_query($conexion, $consulta_materias);

        while($fila = $resultado_materias -> fetch_array()){
            $nombre_materia = $fila['nombre_materia'];
            $ano_materia = $fila['ano_materia'];
            $id_materia = $fila['id_materia'];
    ?>
        <a class="selector-materia" href="planilla_materia.php
            ?id_materia=<?= $id_materia ?>
            &nombre_materia=<?= urlencode($nombre_materia)?>
            &ano_materia=<?= urlencode($ano_materia)?>"
        ><?php echo $ano_materia . "º Año - " . $nombre_materia ?> <br></a> 

    <?php
        }
    ?>
</div>

<!--                    CAJA DEL CAMBIAR CONTRASEÑA                -->
<div class="caja-selector-materias">
    

    <form method="POST">
        <input type="submit" name="btn_solicitud_cambiar_contrasena" value="Quiero cambiar mi contraseña" class="boton-cambiar-contrasena" > <br><br>
    </form>
    
    
    <?php
        include "../controlador/controlador_cambiar_contrasena.php"
    ?>
    

</div>



<br>
<a class="boton-cerrar-sesion" href="../controlador/controlador_cerrar_sesion.php" value="Cerrar Sesion">Cerrar Sesion</a>

</body>
</html>