<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

$rol = $_POST['rol'] ?? ''; // Usamos el operador ?? para evitar errores si no se ha enviado el formulario.

if(!empty($rol)){
    mysqli_query($conn, "INSERT INTO roles (rol) VALUES ('$rol');");
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
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <h2>carga de roles</h2>
    <form action="" method="post"> <label for="rol">rol a agregar</label><br>
        <input type="text" name="rol" id="rol" value="<?php echo htmlspecialchars($rol); ?>"><br><br>
        <input type="submit" value="cargar">
    </form>
    <?php
    // Puedes agregar un mensaje de validación si el campo está vacío al enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($rol)) {
        echo "<p style='color: red;'>Por favor, ingresa el nombre del rol.</p>";
    }
    ?>
</body>
</html>