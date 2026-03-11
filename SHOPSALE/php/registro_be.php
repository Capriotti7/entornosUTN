<?php
include '../includes/conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

$rol = $_POST['rol']; 

// validación de seguridad extra por si alguien altera el HTML - el rol de admin no se puede registrar desde el formulario, solo se puede asignar desde la base de datos    
if($rol != 'cliente' && $rol != 'dueno') {
    $rol = 'cliente';
}

$password_encriptada = password_hash($password, PASSWORD_DEFAULT);

$consulta_verificar = "SELECT * FROM usuarios WHERE email = '$email'";
$verificar_email = mysqli_query($con, $consulta_verificar);

if (mysqli_num_rows($verificar_email) > 0) {
  echo '
        <script>
            alert("Este correo ya está registrado, intenta con otro.");
            window.location = "../registro.php";
        </script>
    ';
  exit();
}

$estado_cuenta = ($rol == 'dueno') ? 'pendiente' : 'aprobada';

$query = "INSERT INTO usuarios(nombre, email, password, rol, estado_cuenta) 
          VALUES('$nombre', '$email', '$password_encriptada', '$rol', '$estado_cuenta')";

$ejecutar = mysqli_query($con, $query);

if ($ejecutar) {
  echo '
        <script>
            alert("Cuenta creada exitosamente. ¡Ya podés iniciar sesión!");
            window.location = "../login.php"; // Redirigir al Login
        </script>
    ';
} else {
  echo '
        <script>
            alert("Error al crear la cuenta. Intentalo de nuevo.");
            window.location = "../registro.php";
        </script>
    ';
}

mysqli_close($con);
?>