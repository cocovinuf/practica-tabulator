<?php
include "../conexion.php";


if(!empty($_POST["btn_agg_alumno"])) {

    if(!empty($_POST["nombre_alumno_agg"]) and !empty($_POST["dni_alumno_agg"]) and !empty($_POST["sede_alumno_agg"]) and !empty($_POST["ano_alumno_agg"])) {
        
        $nombre_alumno_agg = $_POST["nombre_alumno_agg"];
        $dni_alumno_agg = $_POST["dni_alumno_agg"];
        $sede_alumno_agg = $_POST["sede_alumno_agg"];
        $ano_alumno_agg = $_POST["ano_alumno_agg"];
        
        $sql = $conexion -> query(
            "INSERT INTO alumnos(
            nombre_alumno, 
            dni_alumno, 
            id_sede, 
            ano_alumno) 
            
            VALUES (
            '$nombre_alumno_agg', 
            '$dni_alumno_agg', 
            '$sede_alumno_agg', 
            '$ano_alumno_agg')");

            

        if($sql){
            echo "Alumno agregado correctamente";
        }else{
            echo "Error al agregar alumno";
        }

    }else{
        echo "Ingrese todos los datos";
    }
}

?>