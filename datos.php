<?php
// Esta linea le indica al navegador que lo que le vamos a mandar es un json
header("Content-Type: application/json");

include("conexion.php");

$sql = "
SELECT
  a.nombre_alumno,
  a.dni_alumno,
  a.ano_alumno,
  s.nombre_sede,
  m.nombre_materia,
  n.numero_nota,
  n.valor_nota
FROM alumnos a
JOIN sedes s
  ON a.id_sede = s.id_sede
LEFT JOIN inscripciones i
  ON i.id_alumno = a.id_alumno
  AND i.id_materia = 17 
LEFT JOIN materias m
  ON m.id_materia = i.id_materia
LEFT JOIN notas n
  ON n.id_inscripcion = i.id_inscripcion;
";

$resultado = $conexion->query($sql);

//Crea una array
$datos = [];


// fetch_assoc es un metodo del objeto resultado que devuelve la fila entera de la DB que distingue las columnas 
// (es un diccionario, tiene clave y valor) eso lo guarda en row por el nombre de columna.

// Llena el array de arrays

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}


/* Lo que se guarda es algo así:

[
  [
    "id_alumno" => 1,
    "nombre_alumno" => "Juan",
    "nombre_sede" => "Central"
  ],
  [
    "id_alumno" => 2,
    "nombre_alumno" => "Ana",
    "nombre_sede" => "Norte"
  ]
]
 */


//Esto convierte el array de arrays en un json. Es decir un tipo de dato con estructura clave valor que u
// usa la api de tabulator para crear la tabla

echo json_encode($datos);
