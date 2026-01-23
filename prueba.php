<?php
session_start();

if(isset($_POST['btn_modificar_edicion'])){
    $_SESSION['estado_edicion_notas'] = $_POST['estado_edicion_notas'];
}

$estado = $_SESSION['estado_edicion_notas'];
$estadoPJs = json_encode($estado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba estado</title>
</head>
<body>
    


<script>

console.log("El estado es: " + $estadoPJs);

</script>




</body>
</html>