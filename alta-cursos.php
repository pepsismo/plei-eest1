<?php
include "conexion.php";
$grado = $_POST['grado'];

if(!empty($grado)){
    mysqli_query($conn, "INSERT INTO cursos (grado, id_modalidad, id_seccion, id_preceptor a cargo)
    VALUES($grado, 1, 1, 1);");
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
    <form action="./alta-cursos.php" method="post">
        <label for="grado">nombre del curso a agregar</label>
        <input type="text" name="grado" id="grado">
        <input type="submit" value="cargar">
    </form>
</body>
</html>