<?php
function selectorAno($conexion, $name_del_select){

    echo  "<br>";
    echo "<select name=$name_del_select>";
        

    for($i = 1; $i<= 5; $i++ ){
        $selected = "";

        if(isset($_POST[$name_del_select]) && $_POST[$name_del_select] == $i){
            $selected = "selected";
        }

        echo "<option value='$i' $selected>$i</option>";
    };

        
    echo "</select>";



 
}

function selectorSede($conexion, $name_del_select){

        $consultaSedes = "
        SELECT nombre_sede, id_sede
        FROM sedes;";

        $resultado = $conexion -> query($consultaSedes);
        echo  "<br>";
        echo "<select name=$name_del_select>";
            

        while($fila = $resultado -> fetch_assoc()){
            $id_sede = $fila['id_sede'];
            $nombre_sede = $fila['nombre_sede'];

            $selected = "";

            if(isset($_POST[$name_del_select]) && $_POST[$name_del_select] == $id_sede){
                $selected = "selected";
            }

            echo "<option value='$id_sede' $selected>$nombre_sede</option>";
        };

            
        echo "</select>";
}

function selectorMaterias ($conexion , $name_del_select){
            

        $consultaMaterias = "
        SELECT nombre_materia, id_materia, ano_materia
        FROM materias;";

        $resultado = $conexion -> query($consultaMaterias);
        echo  "<br>";
        echo "<select name=$name_del_select>";
            

            while($fila = $resultado -> fetch_assoc()){
                $id_materia = $fila['id_materia'];
                $nombre_materia = $fila['nombre_materia'];
                $ano_materia = $fila['ano_materia'];

                echo "<option value=$id_materia>$ano_materia ° Año - $nombre_materia</option>";
                
            };

            
        echo "</select>";
}

function selectorAlumno($conexion, $name_del_select, $sede, $ano){
    $alumnos = $conexion -> query("
    SELECT nombre_alumno, id_alumno FROM alumnos
    WHERE ano_alumno = $ano
    AND id_sede = $sede;
    ");

    echo  "<br>";
    echo "<select name=$name_del_select>";
        

        while($fila = $alumnos -> fetch_assoc()){
            $id_alumno = $fila['id_alumno'];
            $nombre_alumno = $fila['nombre_alumno'];

            $selected = "";

            if(isset($_POST[$name_del_select]) && $_POST[$name_del_select] == $id_alumno){
                $selected = "selected";
            }

            echo "<option value='$id_alumno' $selected>$nombre_alumno</option>";
            
        };

        
    echo "</select>";

}



?>





