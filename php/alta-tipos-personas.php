<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

$tipo = $_POST['tipo'] ?? ''; // Usamos el operador ?? para evitar errores si no se ha enviado el formulario.

if(!empty($tipo)){
    mysqli_query($conn, "INSERT INTO tipos_personas (tipo) VALUES ('$tipo');");
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
    <h2>CARGA DE TIPOS DE PERSONAS</h2>
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