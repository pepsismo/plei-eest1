<?php
include "conexion.php";

$curso = $_POST['curso'];
$alumno = $_POST['alumno'];

if(!empty($curso) && !empty($alumno)){
    mysqli_query($conn, "INSERT INTO alumnos_x_curso (id_persona_x_curso, id_persona, id_curso) VALUES (NULL, $alumno, $curso);");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
    <h2>CARGA DE ALUMNOS EN CURSOS</h2>
    <form action="" method="post">
        <select name="curso" id="curso">
            <option hidden selected>curso</option>
            <option value="1">6to programacion</option>
        </select>
        <select name="alumno" id="alumno">
            <option hidden selected>alumno</option>
            <option value="2">Pedro Sassia</option>
        </select>
        <input type="submit" value="cargar">
    </form>
</body>
</html>