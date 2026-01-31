<?php
// Esta linea le indica al navegador que lo que le vamos a mandar es un json
header("Content-Type: application/json");


session_start();
$id_materia = $_SESSION['id_materia'];


include("conexion.php");


$consulta_datos_alumnos = "
SELECT
  a.nombre_alumno,
  a.ano_alumno,
  s.nombre_sede,
  n.trimestre_nota,
  n.numero_nota,
  n.valor_nota
FROM alumnos a
JOIN sedes s
  ON a.id_sede = s.id_sede
JOIN inscripciones i
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

// Tengo que conocer la cantidad de indices que tiene $datos_alumnos, luego crear un bucle for que en la primera vuelta agarre los datos del alumno
// y en todas las demas vueltas agarre todas las notas


$cantidad_datos = count($datos_alumnos);
$bandera_nombre = true;
$nombre_anterior = $datos_alumnos[0]['nombre_alumno'];

for ($i=0; $i < $cantidad_datos ; $i++) { 
  

  if($bandera_nombre){
    $nombre = $datos_alumnos[$i]['nombre_alumno'];
    $sede = $datos_alumnos[$i]['nombre_sede'];
    $ano = $datos_alumnos[$i]['ano_alumno'];
    
   $datos_unificados = array ($nombre , $sede , $ano);

    $banderaNombre = false;
  }

$trimestre = $datos_alumnos[$i]['trimestre_nota'];
$numero_nota = $datos_alumnos[$i]['numero_nota'];
$valor = $datos_alumnos[$i]['valor_nota'];

$clafisicacion_nota = 'T'. $trimestre . 'N' . $numero_nota ;
$nota_clasificada[$i] = $clafisicacion_nota . ' = '. $valor . "   ";
}


$nombreynota = array_merge($datos_unificados , $nota_clasificada);
print_r($nombreynota);




//echo "Aca va datos_alumnos";
print_r($datos_alumnos);


//echo json_encode($datos_alumnos);