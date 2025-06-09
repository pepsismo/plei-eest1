<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

$tipo = $_POST['tipo'] ?? ''; // Usamos el operador ?? para evitar errores si no se ha enviado el formulario.

if(!empty($tipo)){
    mysqli_query($conn, "INSERT INTO tipos_personas (tipo) VALUES ('$tipo');");
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
    <h2>carga de tipo de personas</h2>
    <form action="" method="post"> <label for="tipo">tipo de persona a agregar</label><br>
        <input type="text" name="tipo" id="tipo" value="<?php echo htmlspecialchars($tipo); ?>"><br><br>
        <input type="submit" value="cargrar">
    </form>
    <?php
    // Puedes agregar un mensaje de validación si el campo está vacío al enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($tipo)) {
        echo "<p style='color: red;'>Por favor, ingresa el tipo de persona.</p>";
    }
    ?>
</body>
</html>