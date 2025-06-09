<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

$nombre = $_POST['nombre-modalidad'] ?? ''; // Usamos el operador ?? para evitar errores si no se ha enviado el formulario.

if(!empty($nombre)){
    mysqli_query($conn, "INSERT INTO modalidad (modalidad) VALUES ('$nombre');");
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
    <h2>carga de modalidad</h2>
    <form action="" method="post"> <label for="nombre-modalidad">nombre de la modalidad a agregar</label> <br>
        <input type="text" name="nombre-modalidad" id="nombre-modalidad" value="<?php echo htmlspecialchars($nombre); ?>"><br><br>
        <input type="submit" value="cargar">
    </form>
    <?php
    // Puedes agregar un mensaje de validación si el campo está vacío al enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($nombre)) {
        echo "<p style='color: red;'>Por favor, ingresa el nombre de la modalidad.</p>";
    }
    ?>
</body>
</html>