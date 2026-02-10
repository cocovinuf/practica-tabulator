<?php

function selectorMaterias ($conexion , $name_del_select){
            

        $consultaMaterias = "
        SELECT nombre_materia, id_materia, ano_materia
        FROM materias;";

        $resultado = $conexion -> query($consultaMaterias);
        echo  "<br>";
        echo "<select name='$name_del_select'>";
            

            while($fila = $resultado -> fetch_assoc()){
                $id_materia = $fila['id_materia'];
                $nombre_materia = $fila['nombre_materia'];
                $ano_materia = $fila['ano_materia'];

                echo "<option value=$id_materia>$ano_materia ° Año - $nombre_materia</option>";
                
            };

            
        echo "</select>";
}
        

?>





