<?php
include "conexion.php";
$usuario = $_POST['user'];
$password = $_POST['contrasenia'];
/*VERIFICAMOS QUE NO HAYA CAMPOS VACIOS*/
if(!empty($usuario) && !empty($password)){

$resultado = mysqli_query($conn, "SELECT usuario,passwd from personas where usuario ='$usuario'");
if ($resultado) { //Si la consulta devuelve datos ingresa al if.
$fila_encontrada = mysqli_fetch_assoc($resultado);
//La función mysqli_fetch_assoc(parametro), devuelve el resultado encontrado en un array asociativo.
if (!$fila_encontrada) {//Si el usuario es inexistente, ingresa y muestra un mensaje.
echo 'Usuario no encontrado';
} else if (password_verify($password,$fila_encontrada['password']))
{
//la funcion password_verify($contraseña1,$contraseña2) compara si ambas contraseñas son identicas.
echo 'Contraseña incorrecta.';
} else {
echo 'Usuario logueado.';
}
}
mysqli_close($conn);
}else{
echo "<script>
alert('Campos vacíos');
window.history.back(); // Vuelve al formulario sin enviarlo
</script>";
}
?>