<?php

include ("../conexion.php");

//Indica que estoy recibiendo un Json
header("Content-Type: application/json");

// Leo el cuerpo de POST
$input = file_get_contents("php://input");

// convertir JSON a array PHP
$datos = json_decode($input, true);

// Control de excepcion y devolucion de respuesta
if ($datos === null) {
  echo json_encode(["error" => "JSON inválido"]);
  exit;
}


$id_inscripcion = $datos['id_inscripcion'];

// Dentro de datos (que es un array asociativo), refierete al indice como "clave" y a su valor como "valor"
foreach ($datos as $clave => $valor) {
 // Si la clave coincide con el patrón:
 // T + uno o más dígitos, N + uno o más dígitos, seguido de letras,
 // entonces se capturan esas partes y se guardan en el array $m. m[0] tiene el array completo y los demas tienen cada parte
  
  if (preg_match('/^T(\d+)N(\d+)([A-Za-z]+)$/', $clave, $m)) {
    $trimestre   = $m[1];
    $numeroNota  = $m[2];
    $tipoNota   = $m[3];

    // Operador ternario: Es un if en una sola linea. Si valor es un string vacio entonces nota vale null, sino nota vale valor
    $notaSQL = ($valor === "") ? "NULL" : "'$valor'";

    // Creo la consulta SQL para actuaizar una nota existente
    $update = "UPDATE notas SET valor_nota = $notaSQL
    WHERE id_inscripcion = '$id_inscripcion'
    AND trimestre_nota = '$trimestre'
    AND numero_nota = '$numeroNota'
    AND tipo_nota = '$tipoNota';";
    
    // Ejecuto la consulta SQL
    $conexion -> query($update);

    // Veo si la consulta afecto a alguna fila
    if($conexion -> affected_rows === 0)
  
      //Si la consulta afecto a cero filas me fijo si esa fila existe. Porque afectar a cero filas puede ser porque se cargo la misma nota que ya estaba antes. Me fijo entonces con un select
      $check = $conexion->query("
      SELECT 1 FROM notas
      WHERE id_inscripcion = $id_inscripcion
      AND trimestre_nota = $trimestre
      AND numero_nota = $numeroNota
      AND tipo_nota = '$tipoNota'
    ");

    //Si ese select afecto a cero filas entonces esa nota no existe, entonces la creo
    if($check -> num_rows === 0){
    
    $insert = "INSERT INTO `notas`(
    `id_inscripcion`, 
    `trimestre_nota`, 
    `numero_nota`, 
    `valor_nota`, 
    `tipo_nota`) 
    VALUES (
    $id_inscripcion,
    $trimestre,
    $numeroNota,
    $notaSQL,
    '$tipoNota');";

    $conexion -> query($insert);
    }


  }

}

echo json_encode(["ok => true"]);

