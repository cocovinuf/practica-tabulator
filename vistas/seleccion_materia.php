<?php
    session_start();
    if(empty($_SESSION["id_usuario"])){
    header("location:login.php");
    exit();
}

include "../conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
</head>
<body>
    


<h2>Bienvenid@, <?php echo $_SESSION["nombre"]; ?></h2>

<a href="../controlador/controlador_cerrar_sesion.php" value="Cerrar Sesion">Cerrar Sesion</a>

<h3>Materias:</h3>

<?php
    $consulta_materias = "select * from materias where id_profesor = '$_SESSION[id_usuario]'";
    $resultado_materias = mysqli_query($conexion, $consulta_materias);

    while($fila = $resultado_materias -> fetch_array()){

        $nombre_materia = $fila['nombre_materia'];
        $ano_materia = $fila['ano_materia'];
        $id_materia = $fila['id_materia'];
?>
    <a href="planilla_materia.php?id_materia=<?php echo $id_materia?>"> <?php echo $ano_materia . "º Año - " . $nombre_materia ?> <br> <br></a> 

    <?php
        }
    ?>

</body>
</html>