<?php
// Esta linea le indica al navegador que lo que le vamos a mandar es un json
header("Content-Type: application/json");



include("conexion.php");



$consulta_datos_alumnos = "
SELECT
  a.nombre_alumno,
  a.ano_alumno,
  s.nombre_sede,
  n.numero_nota,
  n.valor_nota
FROM alumnos a
JOIN sedes s
  ON a.id_sede = s.id_sede
LEFT JOIN inscripciones i
  ON i.id_alumno = a.id_alumno
  AND i.id_materia = $id_materia
LEFT JOIN notas n
  ON n.id_inscripcion = i.id_inscripcion;
";

$resultado = $conexion->query($consulta_datos_alumnos);

//Crea una array
$datos_alumnos = [];
while ($fila = $resultado->fetch_assoc()) {
    $datos_alumnos[] = $fila;
}




/*$sql_notas="

SELECT
    id_materia,
    trimestre_nota, 
    numero_nota, 
    valor_nota, 
    tipo_nota 
FROM notas n
where n.id_materia = $id_materia;
";*/




//Esto convierte el array de arrays en un json. Es decir un tipo de dato con estructura clave valor que u
// usa la api de tabulator para crear la tabla

echo json_encode($datos_alumnos);
