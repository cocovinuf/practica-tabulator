<?php
include "../conexion.php";


if(isset($_POST['btn_elim_alumno'])){
    $dni_alumno_elim = $_POST['dni_alumno_elim'];
    $consulta_nombre_alumno = $conexion->query("SELECT nombre_alumno FROM alumnos WHERE dni_alumno = $dni_alumno_elim");         
    $fila = $consulta_nombre_alumno -> fetch_assoc();
    $nombre_alumno = $fila['nombre_alumno'];
    echo "¿Desea eliminar a: " . $nombre_alumno . "?"; 
    ?>  

        <form method="post">
            <input type="hidden" name="dni_alumno_elim" value="<?php echo $dni_alumno_elim; ?>">
            <input type="submit" name="btn_confirmar_elim_alumno" value="Eliminar Alumno">
            <input type="submit" name="btn_cancelar_elim_alumno" value="Cancelar">
        </form>
    

    <?php
}


    if(isset($_POST['btn_confirmar_elim_alumno'])){
        $dni_alumno_elim = $_POST['dni_alumno_elim'];
        $consulta = $conexion -> query("DELETE FROM alumnos WHERE dni_alumno = $dni_alumno_elim");
        if($consulta){
                echo "Alumno eliminado correctamente";
        }else{
                echo "Error al eliminar el alumno";
        }
    }

    if(isset($_POST['btn_cancelar_elim_alumno'])){

        echo "Eliminación cancelada";

    }


?>