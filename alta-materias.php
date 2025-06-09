<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

$nombre = $_POST['nombre_materia'] ?? ''; // Usamos el operador ?? para evitar errores si no se ha enviado el formulario.
$turno = $_POST['turno'] ?? '';
$grupo = $_POST['grupo'] ?? '';

if(!empty($nombre) && !empty($turno) && !empty($grupo)){
    mysqli_query($conn, "INSERT INTO materias (nombre_materia, turno, grupo, id_persona, id_curso)
    VALUES ('$nombre', '$turno', '$grupo', 1, 1);");
    mysqli_close($conn);
    // Opcional: podrías agregar una redirección o un mensaje de éxito aquí.
    // header("Location: alguna_pagina_de_exito.php");
    // exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>carga de materia</h2>
    <form action="" method="post"> <label for="nombre_materia">nombre de la materia a agregar</label> <br>
        <input type="text" name="nombre_materia" id="nombre_materia" value="<?php echo htmlspecialchars($nombre); ?>"><br>
        <label for="turno">turno</label><br>
        <input type="text" name="turno" id="turno" value="<?php echo htmlspecialchars($turno); ?>"><br>
        <label for="grupo">grupo</label><br>
        <input type="number" name="grupo" id="grupo" value="<?php echo htmlspecialchars($grupo); ?>"><br><br>
        <input type="submit" value="cargar">
    </form>
    <?php
    if (isset($_POST['submit']) && empty($nombre) || empty($turno) || empty($grupo)) {
        echo "<p style='color: red;'>Por favor, rellena todos los campos.</p>";
    }
    ?>
</body>
</html>