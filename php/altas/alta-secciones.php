<?php
include "conexion.php";
$seccion = $_POST['seccion'];

if(!empty($seccion)){
    mysqli_query($conn, "INSERT INTO secciones (seccion) VALUES ('$seccion');");
    mysqli_close($conn);
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
    <h2>CARGA DE SECCIONES</h2>
    <form action="" method="post">
        <label for="seccion">nombre de la seccion a agregar</label> <br><br>
        <input type="text" name="seccion" id="seccion">
        <input type="submit" value="cargar">
    </form>
</body>
</html>