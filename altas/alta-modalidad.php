<?php
include "../conexion.php";
$nombre = $_POST['nombre-modalidad'];
echo $nombre;

if(!empty($nombre)){
    mysqli_query($conn, "INSERT INTO modalidad (modalidad) VALUES ('$nombre');");
    mysqli_close($conn);
}
?>