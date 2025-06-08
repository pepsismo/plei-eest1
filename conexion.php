<?php
//archivo para conexión a la BD.
$host = "localhost"; //Host del servidor, en este caso local.
$usuario = "root"; //usuario de la BD, por defecto root.
$contrasena = ""; // contraseña de la BD, por defecto vacío.
$base_de_datos = "plei_db"; //nombre de tu BD
$conn = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);
//conectamos a la bd y guardamos la conexión en "$conn"
// Verificar conexión
if (!$conn) {
die("Conexión fallida: ".mysqli_connect_error());
}else{
echo "Conexión exitosa a: {$base_de_datos}, usuario: {$usuario}, host: {$host} <br>";
}
?>