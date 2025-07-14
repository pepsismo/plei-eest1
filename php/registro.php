<?php
include "conexion.php";
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['mail'];
$usuario = $_POST['usuario'];
$dni = $_POST['dni'];
$passwd = $_POST['passwd'];
$rol = $_POST['rol'];
$tipo_persona = $_POST['tipo_persona'];

$tipo = [];
$rols = [];

$resultado = mysqli_query($conn, "SELECT * FROM tipos_personas;");
if($resultado){
    while ($_tipo = mysqli_fetch_assoc($resultado)){
        $tipo[] = $_tipo;
    }
}

$resultado = mysqli_query($conn, "SELECT * FROM roles;");
if($resultado){
    while ($_rol = mysqli_fetch_assoc($resultado)){
        $rols[] = $_rol;
    }
}

if(!empty($nombre) && !empty($apellido) && !empty($mail) && !empty($usuario) && !empty($dni) && !empty($passwd) && !empty($rol) && !empty($tipo_persona)){
    mysqli_query($conn, "INSERT INTO personas ('dni', 'apellido', 'nombre', 'mail', 'usuario', 'passwd', 'id_rol', 'id_tipo_persona') VALUES ('$dni', '$apellido', '$nombre', '$mail', '$usuario', '$passwd', '$rol', '$tipo_persona');");
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Registro de usuario</title>
</head>
<body>
    <h2>Formulario de Registro</h2>
    <form action="" method="post">
        <input type="number" id="dni" name="dni" placeholder="DNI"><br><br>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre"><br><br>
        <input type="text" id="apellido" name="apellido" placeholder="Apellido"><br><br>
        <input type="email" id="mail" name="mail" placeholder="E-Mail"><br><br>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario"><br><br>
        <input type="password" id="passwd" name="passwd" placeholder="Contraseña"><br><br>
        <select name="tipo_persona" id="tipo_persona">
            <option hidden selected>tipo persona</option>
            <?php foreach ($tipo as $tipo_) { ?>
            <option value="<?php echo htmlspecialchars($tipo_['id_tipo_persona']);?>">
            <?php echo htmlspecialchars($tipo_['tipo']);?>
            </option>
            <?php }?>
        </select>

        <select name="rol" id="rol">
            <option hidden selected>rol</option>
            <?php foreach ($rols as $rol_) {?>
            <option value="<?php echo htmlspecialchars($rol_['id_rol']);?>">
            <?php echo htmlspecialchars($rol_['rol']);?>
            </option>
            <?php }?>
        </select>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>