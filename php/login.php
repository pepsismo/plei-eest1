<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

// Inicializar variables para evitar errores Undefined index si el formulario no se ha enviado aún
$usuario_ingresado = $_POST['user'] ?? '';
$password_ingresada = $_POST['contrasenia'] ?? '';

$mensaje = ''; // Variable para almacenar mensajes de retroalimentación al usuario

/* VERIFICAMOS SI EL FORMULARIO HA SIDO ENVIADO */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* VERIFICAMOS QUE NO HAYA CAMPOS VACÍOS */
    if (!empty($usuario_ingresado) && !empty($password_ingresada)) {

        // Preparar la consulta para evitar inyección SQL
        // Asumiendo que el campo de la contraseña en la base de datos se llama 'passwd'
        $query = "SELECT usuario, passwd FROM personas WHERE usuario = ?";

        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $usuario_ingresado);
            mysqli_stmt_execute($stmt);
            $resultado = mysqli_stmt_get_result($stmt);

            if ($fila_encontrada = mysqli_fetch_assoc($resultado)) {
                // Si el usuario existe, verificar la contraseña.
                // Es CRUCIAL que las contraseñas en la DB estén HASHEADAS con password_hash()
                // Si no lo están, password_verify() siempre fallará o no funcionará como esperas.
                // Si tus contraseñas no están hasheadas, necesitas cambiar la lógica aquí.
                if (password_verify($password_ingresada, $fila_encontrada['passwd'])) {
                    $mensaje = "<p style='color: green;'>¡Usuario logueado exitosamente!</p>";
                    // Aquí podrías iniciar una sesión, redirigir al usuario, etc.
                    // Ejemplo: session_start(); $_SESSION['usuario'] = $usuario_ingresado; header('Location: dashboard.php'); exit();
                } else {
                    $mensaje = "<p style='color: red;'>Contraseña incorrecta.</p>";
                }
            } else {
                // El usuario no fue encontrado
                $mensaje = "<p style='color: red;'>Usuario no encontrado.</p>";
            }
            mysqli_stmt_close($stmt);
        } else {
            $mensaje = "<p style='color: red;'>Error en la preparación de la consulta: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn); // Cerrar la conexión después de la operación
    } else {
        $mensaje = "<p style='color: red;'>Por favor, ingresa tu usuario y contraseña.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/styles.css">
<title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php echo $mensaje; // Mostrar mensaje de éxito o error ?>
<form action="" method="post"> <input type="text" id="user" name="user"
placeholder="Usuario" value="<?php echo htmlspecialchars($usuario_ingresado); ?>"><br><br>
<input type="password" id="contrasenia" name="contrasenia"
placeholder="Contraseña" value=""><br><br> <input type="submit" value="Ingresar">
</form>
</body>
</html>