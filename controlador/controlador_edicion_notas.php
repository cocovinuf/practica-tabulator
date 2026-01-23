<?php
session_start();

if(isset($_POST['btn_modificar_edicion'])){
    $estado = $_SESSION['estado_edicion_notas'];
}


?>

<script>
var estado = <?php $estado ?>;
</script>