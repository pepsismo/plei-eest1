<?php
include "conexion.php";

$resultado = mysqli_query($conn, "SELECT * FROM materias")
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
    <h2>Listado de Materias</h2>
    <div class="tabla">    
    <table>
        <tr>
            <th>ID</th>
            <th>tipo material</th>
            <th>unidad</th>
            <th>link</th>
            <th>id materia</th>
        </tr>
        
        <?php
        $contador = 1;
    if ($resultado) {
        while ($fila = fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $contador . "</td>";
            echo "<td>" . htmlspecialchars($fila["nombre_materia"]) . "</td>";
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