<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//Enriptar contraseña
$contrasena = hash('sha512', $contrasena);

$query ="INSERT INTO usuarios(nombre_completo,correo,usuario,contrasena) 
         VALUES('$nombre_completo', '$correo' , '$usuario' , '$contrasena')";

 //Verificar que el correo no existe en la base de registro
  $verificar_correo =mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");
  
  if(mysqli_num_rows($verificar_correo) >0){
    echo '
    <script>
    alert("Tu correo ya esta registrado en el rincón psicológico");
    window.location = "../index.php";
    </script>    
    ';
    exit();

}
//Verificar que el usuario no existe en la base de registro
$verificar_usuario =mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");
  
if(mysqli_num_rows($verificar_usuario) >0){
  echo '
  <script>
  alert("Ya existe un usuario con el mismo nombre en el rincón psicológico, intenta con uno diferente");
  window.location = "../index.php";
  </script>    
  ';
  exit();
}

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script>
            alert("Usuario registrado exitosamente");
            window.location ="../index.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Inténtalo de nuevo, usuario no registrado");
            window.location = "../index.php";
        </script>
    ';
}
 mysqli_close($conexion);



?>