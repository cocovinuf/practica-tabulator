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


print_r($datos);

// Dentro de datos (que es un array asociativo), refierete al indice como "clave" y a su valor como "valor" y para cada uno de ellos haz...
foreach($datos as $clave => $valor){

 if (preg_match('/^T(\d+)N(\d+)Envio+)$/', $clave, $m))
    $trimestre   = $m[1];
    $numeroNota  = $m[2];
    $tipoNota   = $m[3];
}

