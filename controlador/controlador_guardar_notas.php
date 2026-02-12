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

////////////////////////////////////////////////// GUARDADO DE NOTAS

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
    if($conexion -> affected_rows === 0){
  
      //Si la consulta afecto a cero filas me fijo si esa fila existe. Porque afectar a cero filas puede ser porque se cargo la misma nota que ya estaba antes o porque esa nota no existe. Me fijo entonces con un select
      $check = $conexion->query("
      SELECT 1 FROM notas
      WHERE id_inscripcion = $id_inscripcion
      AND trimestre_nota = $trimestre
      AND numero_nota = $numeroNota
      AND tipo_nota = '$tipoNota'
      ");
    
      //Si ese select afecto a cero filas entonces esa nota no existe, por lo que no puedo hacer un UPDATE, necesito usar un INSERT el cual CREA la nota, entonces la creo:
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

}



////////////////////////////////////////////////// CALCULO DE PROMEDIOS



$sumatoriaNotasT1 = 0;
$cantNotasT1 = 0;

$sumatoriaNotasT2= 0;
$cantNotasT2 = 0;

$sumatoriaNotasT3=0;
$cantNotasT3 = 0;

// Tomo todas las notas del alumno en cada vuelta
$resultado = $conexion -> query("
  SELECT 
    trimestre_nota,
    numero_nota,
    valor_nota,
    tipo_nota
  FROM notas
  WHERE id_inscripcion = $id_inscripcion;
  ");


//Almaceno el resutltado en un array asociativos e itero una vez por cada nota del array
while( $fila = $resultado->fetch_assoc()){
  
  // Diferencio las notas por trimestre y tipo y hago sus sumatorias 

  switch(true){
    case ($fila['trimestre_nota'] == 1 && ($fila['tipo_nota'] == 'Envio' OR $fila['tipo_nota'] == 'Concepto')):
      $sumatoriaNotasT1 = $sumatoriaNotasT1 + $fila['valor_nota'];
      $cantNotasT1++;
      break;
    
    case($fila['trimestre_nota'] == 2 && ($fila['tipo_nota'] == 'Envio' OR $fila['tipo_nota'] == 'Concepto')):
      $sumatoriaNotasT2 = $sumatoriaNotasT2 + $fila['valor_nota'];
      $cantNotasT2++;
      break;

    case($fila['trimestre_nota'] == 3 && ($fila['tipo_nota'] == 'Envio' OR $fila['tipo_nota'] == 'Concepto')):
      $sumatoriaNotasT3 = $sumatoriaNotasT3 + $fila['valor_nota'];
      $cantNotasT3++;
      break;
  }

}

//Usando las sumatorias hago el calculo de promedios
$promedioT1 = $cantNotasT1 > 0 ? $sumatoriaNotasT1 / $cantNotasT1 : NULL;
$promedioT2 = $cantNotasT2 > 0 ? $sumatoriaNotasT2 / $cantNotasT2 : NULL; 
$promedioT3 = $cantNotasT3 > 0 ? $sumatoriaNotasT3 / $cantNotasT3 : NULL;  

// Uso un for para escribir las consultas una vez y se haga para todos los trimestres
for ($i=1; $i < 4 ; $i++) { 
      
  switch($i){
  case 1: $nota = $promedioT1; break;
  case 2: $nota = $promedioT2; break;
  case 3: $nota = $promedioT3; break;
  }
      
  //Cargamos los datos a la db. Hay que verificar que se carguen al alumno correcto
  $update = $conexion -> query("
  UPDATE `notas` SET `valor_nota` = $nota
  WHERE `tipo_nota` = 'Promedio'
  AND `trimestre_nota` = $i
  AND `numero_nota` = 2
  AND `id_inscripcion` = $id_inscripcion;
  ");

  // Chequeamos que el update haya funcionado seleccionando la fila que actualizamos. Si no seleccionamos nada es porque esa nota no existe, entonces mas adelante la creamos

  $check = $conexion -> query("
    SELECT valor_nota 
    FROM notas
    WHERE id_inscripcion = $id_inscripcion
    AND tipo_nota = 'Promedio'
    AND trimestre_nota = $i
  ");

  if($check -> num_rows === 0){
    $insert = $conexion -> query ("
    INSERT INTO `notas` (`tipo_nota`, `valor_nota`, `trimestre_nota`, `numero_nota`, `id_inscripcion`)
    VALUES('Promedio', $nota , $i , 2, $id_inscripcion);
  ");
  }

  // Por logica de negocio el recuperatorio debe reemplazar al promedio si es mayor. Entonces leemos y comparamos promedio y recuperatorio:


  for ($i=1; $i < 4 ; $i++) { 

    $resultado = $consulta = $conexion -> query ("
    SELECT MAX(valor_nota) 
    FROM notas
    WHERE id_inscripcion = $id_inscripcion
    AND trimestre_nota = $i
    AND (tipo_nota = 'Promedio'
    OR tipo_nota = 'Recuperatorio')
    ");


    if($resultado -> num_rows === 0){
      $conexion -> query("
      INSERT INTO `notas` (`id_inscripcion` , `trimestre_nota` , `numero_nota` , `valor_nota`, `tipo_nota`)
      VALUES ($id_inscripcion, $i, 4, "NULL", 'MAX')
      ")
    }
      
    $update = $conexion -> query("
      UPDATE notas SET 'valor_nota' = $resultado

    ");

        
      }

}







echo json_encode(["ok => true"]);

