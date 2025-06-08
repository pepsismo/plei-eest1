<?php
include "../conexion.php";
$rol = $_POST['rol'];

if(!empty($rol)){
    mysqli_query($conn, "INSERT INTO roles (rol) VALUES ('$rol');");
    mysqli_close($conn);
}
?>