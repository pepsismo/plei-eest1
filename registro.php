<?php
include "conexion.php"; //Incluimos el archivo php para poder utilizar la variable de conexión.
$nombre = $_POST['nombre'];
$apellido =$_POST['apellido'];
$mail = $_POST['mail'];
$usuario = $_POST['usuario'];
$dni = $_POST['dni'];
$passwd = $_POST['passwd'];
/*VERIFICAMOS QUE NO HAYA CAMPOS VACIOS*/
if(!empty($nombre) && !empty($apellido) && !empty($mail) &&
!empty($usuario) && !empty($dni) && !empty($passwd)){

mysqli_query($conn, "INSERT INTO personas
(dni,apellido,nombre,mail,usuario,passwd,id_rol,id_tipo_persona) VALUES
('$dni','$apellido','$nombre','$mail','$usuario','$passwd', 1, 1)");
mysqli_close($conn);
}else{
echo "<script>
alert('Campos vacíos');
window.history.back(); // Vuelve al formulario sin enviarlo
</script>";
}
?>