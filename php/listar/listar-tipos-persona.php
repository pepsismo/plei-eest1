<?php
include "conexion.php";

$resultado = mysqli_query($conn, "SELECT * FROM tipos_personas")
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
    <h2>Listado de Tipos de Personas</h2>
    <div class="tabla">    
    <table>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
        </tr>
        
        <?php
        $contador = 1;
    if ($resultado) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $contador . "</td>";
            echo "<td>" . htmlspecialchars($fila["tipo"]) . "</td>";
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