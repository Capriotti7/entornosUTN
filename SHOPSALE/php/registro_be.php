<?php
// 1. Incluir la conexión a la Base de Datos
include '../includes/conexion.php';

// 2. Recibir los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];
$rol = 'cliente'; // Por defecto, todos son clientes al registrarse

// 3. Encriptar la contraseña (SEGURIDAD)
$password_encriptada = password_hash($password, PASSWORD_DEFAULT);

// 4. Verificar que el correo no se repita
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

// 5. Insertar datos en la base de datos
$query = "INSERT INTO usuarios(nombre, email, password, rol) 
          VALUES('$nombre', '$email', '$password_encriptada', '$rol')";

$ejecutar = mysqli_query($con, $query);

// 6. Verificar si se guardó correctamente
if ($ejecutar) {
  echo '
        <script>
            alert("Usuario almacenado exitosamente.");
            window.location = "../login.php"; // Redirigir al Login
        </script>
    ';
} else {
  echo '
        <script>
            alert("Error al almacenar usuario.");
            window.location = "../registro.php";
        </script>
    ';
}

// Cerrar conexión
mysqli_close($con);
