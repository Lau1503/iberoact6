<?php
$conexion = mysqli_connect("localhost", "root", "", "login_usuario");

if($conexion){
    echo 'Conectado a la base de datos de forma exitosa';
} else {
    echo 'No se pudo establecer la conexión a la base de datos';
}
?>