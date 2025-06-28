<?php
include "conexion.php";
$seccion = $_POST['seccion'];

if(!empty($seccion)){
    mysqli_connect($conn, "INSERT INTO 'secciones' ('id_seccion', 'seccion') VALUES (NULL, '$seccion');");
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
    <h2>CARGA DE SECCIONES</h2>
    <form action="alta-secciones.php" method="post">
        <label for="seccion">nombre de la seccion a agregar</label> <br><br>
        <input type="text" name="seccion" id="seccion">
        <input type="submit" value="cargar">
    </form>
</body>
</html>