<?php
include "conexion.php"; // Asegúrate de que la ruta a 'conexion.php' sea correcta desde la ubicación de este nuevo archivo.

// Inicializar variables para evitar errores Undefined index si el formulario no se ha enviado aún
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$mail = $_POST['mail'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$dni = $_POST['dni'] ?? '';
$passwd = $_POST['passwd'] ?? '';

$mensaje = ''; // Variable para almacenar mensajes de éxito o error

/* VERIFICAMOS SI EL FORMULARIO HA SIDO ENVIADO */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* VERIFICAMOS QUE NO HAYA CAMPOS VACÍOS */
    if(!empty($nombre) && !empty($apellido) && !empty($mail) &&
       !empty($usuario) && !empty($dni) && !empty($passwd)){

        // Es altamente recomendable HASHEAR la contraseña antes de guardarla en la base de datos por seguridad.
        // Ejemplo: $hashed_passwd = password_hash($passwd, PASSWORD_DEFAULT);

        $query = "INSERT INTO personas (dni,apellido,nombre,mail,usuario,passwd,id_rol,id_tipo_persona) VALUES (?,?,?,?,?,?,?,?)";
        
        // Preparar la consulta para evitar inyección SQL
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Asignar parámetros (s: string, i: integer)
            // Asumiendo que id_rol y id_tipo_persona son enteros (1 y 1)
            mysqli_stmt_bind_param($stmt, "isssssii", $dni, $apellido, $nombre, $mail, $usuario, $passwd, $id_rol_default, $id_tipo_persona_default);
            
            $id_rol_default = 1; // Valor por defecto para id_rol
            $id_tipo_persona_default = 1; // Valor por defecto para id_tipo_persona

            if (mysqli_stmt_execute($stmt)) {
                $mensaje = "<p style='color: green;'>¡Registro exitoso!</p>";
                // Opcional: limpiar los campos del formulario después de un registro exitoso
                $nombre = $apellido = $mail = $usuario = $dni = $passwd = '';
            } else {
                $mensaje = "<p style='color: red;'>Error al registrar: " . mysqli_error($conn) . "</p>";
            }
            mysqli_stmt_close($stmt);
        } else {
            $mensaje = "<p style='color: red;'>Error en la preparación de la consulta: " . mysqli_error($conn) . "</p>";
        }
        mysqli_close($conn); // Cerrar la conexión después de la operación
    } else {
        $mensaje = "<p style='color: red;'>Error: Todos los campos son obligatorios.</p>";
        // Aquí no se usa window.history.back() porque estamos en el mismo archivo.
        // En su lugar, se muestra un mensaje.
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
<title>Registro de usuario</title>
</head>
<body>
<h2>Formulario de Registro</h2>
<?php echo $mensaje; // Mostrar mensaje de éxito o error ?>
<form action="" method="post"> <input type="number" id="dni" name="dni"
placeholder="DNI" value="<?php echo htmlspecialchars($dni); ?>"><br><br>
<input type="text" id="nombre" name="nombre"
placeholder="Nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br><br>
<input type="text" id="apellido" name="apellido"
placeholder="Apellido" value="<?php echo htmlspecialchars($apellido); ?>"><br><br>
<input type="email" id="mail" name="mail"
placeholder="E-Mail" value="<?php echo htmlspecialchars($mail); ?>"><br><br>
<input type="text" id="usuario" name="usuario"
placeholder="Usuario" value="<?php echo htmlspecialchars($usuario); ?>"><br><br>
<input type="password" id="passwd" name="passwd"
placeholder="Contraseña" value=""><br><br> <input type="submit" value="Registrar">
</form>
</body>
</html>