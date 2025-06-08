<?php
include "../conexion.php";
$tipo = $_POST['tipo'];
echo $tipo;

if(!empty($tipo)){
    mysqli_query($conn, "INSERT INTO tipos_personas (tipo) VALUES ('$tipo');");
    mysqli_close($conn);
}
?>