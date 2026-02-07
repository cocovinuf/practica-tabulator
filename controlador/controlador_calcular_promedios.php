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

