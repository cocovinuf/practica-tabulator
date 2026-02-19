<?php
include '../conexion.php';

if(isset($_POST['btn_modificar_alumno'])){  
    if(!empty('dni_alumno_modif')){

        $dni_alumno_modif = $_POST['dni_alumno_modif'];

        $check = $conexion -> query("
            SELECT 
            a.nombre_alumno,
            a.id_alumno,
            s.nombre_sede
            FROM alumnos a
            LEFT JOIN sedes s
            ON s.id_sede = a.id_sede
            WHERE dni_alumno = $dni_alumno_modif
        ");

        if($check -> num_rows > 0){

            $resultado = $check -> fetch_assoc();
            $nombre_previo = $resultado['nombre_alumno'];
            $dni_previo = $dni_alumno_modif;
            $sede_previa = $resultado['nombre_sede'];
            $id_alumno = $resultado['id_alumno'];

            
            echo "<br>Modificando al alumno: $nombre_previo" . "<br><br>";
           ?>
            <label>Apellido:</label> <br>
            <input type='text' name='apellido_alumno' placeholder='Apellido'><br><br>
            <label>Nombre:</label> <br>
            <input type='text' name='nombre_alumno' placeholder='Nombre'><br><br>
            <label>DNI:</label><br>
            <input type='number' name='dni_alumno' placeholder='DNI'><br>
            <input type='hidden' name='nombre_previo' value='<?php echo $nombre_previo;?>'>
            <input type='hidden' name='dni_previo' value='<?php echo $dni_previo;?>'>
            <input type='hidden' name='sede_previa' value='<?php echo $sede_previa;?>'>
            <input type='hidden' name='id_alumno' value='<?php echo $id_alumno;?>'>
            ";

            <?php
            echo "<br><label>Sede:</label>";
            selectorSede($conexion, 'sede_alumno');

            echo "<br><br><input type='submit' name='modif_datos' value='Editar datos'>";
        }else{echo "<script>mostrarMensaje('No existe ningun alumno con ese DNI')</script>";}

    }else{echo "<script>mostrarMensaje('Debe ingresar el dni del alumno a modificar')</script>";}
}

if(isset($_POST['modif_datos'])){

$nombre = $_POST['nombre_previo'];
$

    echo "Desea pasar de: 
    <br><br> Nombre: '';
    <br><br> DNI: $dni_alumno_modif
    <br><br> Sede: $sede_previa";
}




?>