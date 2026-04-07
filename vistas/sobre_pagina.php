<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre la pagina</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-dark-subtle">
    


<div class= "container fluid">

<h1 class="p-5">¿De que trata este proyecto?</h1>

    <div class="row">
        <div class="col-md-12 border 5px dark p-3 bg-light shadow p-3 mb-5 bg-body-tertiary rounded">
            <p>
                Esta página es un proyecto de práctica para aprender conceptos de programación, bases de datos y uso de librerías. Está basado en un caso real de un colegio virtual rural que necesita mejorar su sistema de registro de calificaciones y generación de boletines.

                <br><br>

                Actualmente, la generación de boletines toma aproximadamente dos semanas y requiere el trabajo de 3 o 4 personas. Este proyecto reduce ese tiempo a alrededor de dos horas, incluso si lo utiliza una sola persona.

                <br><br>

                Esta web utiliza la librería "Tabulator" como herramienta principal para el registro de notas por parte de cada profesor en su área. Estas notas se guardan en la base de datos mediante PHP y luego se leen para generar los boletines desde la vista de los administradores.

                <br><br>

                Además, cuenta con distintos tipos de usuarios con diferentes permisos.

                <br><br>

                Cabe aclarar que este sistema actualmente no se está utilizando en la institución educativa debido a cuestiones de seguridad y concurrencia en la base de datos.
            </p>
            
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>

</body>
</html>