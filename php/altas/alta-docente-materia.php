<?php
include "conexion.php";

$docentes = [];
$materias = [];

$resultado = mysqli_query($conn, "SELECT id_persona, nombre, apellido, dni, tipos_personas.tipo FROM personas INNER JOIN tipos_personas on personas.id_tipo_persona = tipos_personas.id_tipo_persona where tipos_personas.tipo = 'profesor'");
if($resultado){
    while($_docente = mysqli_fetch_assoc($resultado)){
        $docentes[] = $_docente;
    }
}

$docente = $_POST['docente'];
$materia = $_POST['materia'];

$resultado = mysqli_query($conn, "SELECT * FROM materias");
if($resultado){
    while($_materias = mysqli_fetch_assoc($resultado)){
        $materias[] = $_materias;
    }
}




if (!empty($docentes) && !empty($materia)){
    mysqli_query($conn, "INSERT INTO docentes_x_materia (id_materia, id_persona) VALUES ()");
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
    <h2>CARGA DOCENTES POR MATERIA</h2>
    <form action="" method="post">
        <select name="docente" id="docente">
            <option hidden selected>docente</option>
            <?php foreach ($docentes as $docente_){ ?>
            <option value="<?php echo htmlspecialchars($docente_['id_persona']);?>">
            <?php echo htmlspecialchars($docente_['nombre'])." ".htmlspecialchars($docente_['apellido']); ?>
            </option>
            <?php }?>
        </select>
        <select name="materia" id="materia">
            <option hidden selected>materia</option>
            <?php foreach ($materias as $materias_){?>
                <option value="<?php echo htmlspecialchars($materias_['id_materia']);?>>">
                    <?php echo htmlspecialchars($materias_['nombre_materia']); ?>
                </option>
            <?php }?>
        </select>
        <input type="submit" value="cargar">
    </form>
</body>
</html>