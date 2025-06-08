<?php
include "../conexion.php";
$nombre = $_POST['nombre_materia'];
$turno = $_POST['turno'];
$grupo = $_POST['grupo'];

if(!empty($nombre) && !empty($turno) && !empty($grupo)){
    mysqli_query($conn, "INSERT INTO materias (nombre_materia, turno, grupo, id_persona, id_curso)
    VALUES ('$nombre', '$turno', '$grupo', 1, 1);");
    mysqli_close($conn);
}

?>