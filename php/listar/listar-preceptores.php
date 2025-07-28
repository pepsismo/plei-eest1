<?php
include "conexion.php";

$resultado = mysqli_query($conn, "SELECT * FROM personas INNER JOIN tipos_personas on personas.id_tipo_persona = tipos_personas.id_tipo_persona where tipos_personas.tipo = 'preceptor';")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>
<body>
    <h2>Listado de Preceptores</h2>
    <div class="tabla">    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>DNI</th>
        </tr>
        
        <?php
        $contador = 1;
    if ($resultado) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $contador . "</td>";
            echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["apellido"]). "</td>";
            echo "<td>" . htmlspecialchars($fila["mail"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["dni"]) . "</td>";
            echo "</tr>";
            $contador++;
        }
    } else {
        echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
    }
    $conexion->close();
    ?>
</table>
</div>
</body>
</html>