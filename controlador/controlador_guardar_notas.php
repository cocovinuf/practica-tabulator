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

foreach ($datos as $clave => $valor) {
    if (preg_match('/^T(\d+)N(\d+)([A-Za-z]+)$/', $clave, $m)) {

        $trimestre   = $m[1];
        $numeroNota  = $m[2];
        $tipoNota   = $m[3];
        // Operador ternario: Es un if en una sola linea. Si valor es un string vacio entonces nota vale null, sino nota vale valor
        $notaSQL = ($valor === "") ? "NULL" : "'$valor'";

           $sql = $conexion -> query("
            
           UPDATE notas SET valor_nota = $notaSQL
           WHERE id_inscripcion = '$id_inscripcion'
           AND trimestre_nota = '$trimestre'
           AND numero_nota = '$numeroNota'
           AND tipo_nota = '$tipoNota';"
           );

    }
}

echo json_encode(["ok" => true]);

