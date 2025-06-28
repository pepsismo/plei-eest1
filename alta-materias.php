<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

$nombre = $_POST['nombre_materia'] ?? ''; // Usamos el operador ?? para evitar errores si no se ha enviado el formulario.
$turno = $_POST['turno'] ?? '';
$grupo = $_POST['grupo'] ?? '';

if(!empty($nombre) && !empty($turno) && !empty($grupo)){
    mysqli_query($conn, "INSERT INTO materias (nombre_materia, turno, grupo, id_persona, id_curso)
    VALUES ('$nombre', '$turno', '$grupo', 1, 1);");
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <h2>CARGA DE MATERIAS</h2>
    <form action="" method="post"> <label for="nombre_materia">nombre de la materia a agregar</label> <br>
        <input type="text" name="nombre_materia" id="nombre_materia" value="<?php echo htmlspecialchars($nombre); ?>"><br>
        <label for="turno">turno</label><br>
        <input type="text" name="turno" id="turno" value="<?php echo htmlspecialchars($turno); ?>"><br>
        <label for="grupo">grupo</label><br>
        <input type="number" name="grupo" id="grupo" value="<?php echo htmlspecialchars($grupo); ?>"><br>
        <label for="curso">Curso</label><br>
        <select name="curso" id="curso">
            <option value="1">6to programacion</option>
        </select><br><br>
        <input type="submit" value="cargar">
    </form>
</body>
</html>