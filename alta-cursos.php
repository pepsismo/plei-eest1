<?php
include "conexion.php";
$grado = $_POST['grado'];
$moda = $_POST['moda'];
$seccion = $_POST['seccion'];
$prece = $_POST['preceptor'];


if(!empty($grado)){
    mysqli_query($conn, "INSERT INTO cursos (grado, id_modalidad, id_seccion, id_preceptor a cargo) VALUES($grado, 1, 1, 1);");
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
    <h2>CARGA DE CURSOS</h2>
    <form action="./alta-cursos.php" method="post">
        <h3>curso a agregar</h3>
        <input type="text" name="grado" id="grado" placeholder="curso">
        <select name="moda" id="moda">
            <option hidden selected>modalidad</option>
        </select>
        <select name="seccion" id="seccion">
            <option hidden selected>seccion</option>
        </select>
        <select name="preceptor" id="preceptor">
            <option hidden selected>preceptor</option>
        </select>
        <input type="submit" value="cargar">
    </form>
</body>
</html>