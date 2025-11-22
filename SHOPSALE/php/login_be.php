<?php
// 1. Iniciar la sesión (SIEMPRE debe ser lo primero)
session_start();

include '../includes/conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];

// 2. Buscar el usuario por email
$validar_login = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email'");

if (mysqli_num_rows($validar_login) > 0) {
  // El email existe, ahora traemos los datos
  $usuario = mysqli_fetch_assoc($validar_login);

  // 3. Verificar la contraseña encriptada
  // password_verify(contraseña_escrita, contraseña_encriptada_en_bd)
  if (password_verify($password, $usuario['password'])) {

    // Guardamos variables de sesión para usarlas en todo el sitio
    $_SESSION['usuario'] = $email;
    $_SESSION['nombre_usuario'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    // Redirigimos al Inicio
    header("location: ../index.php");
    exit;
  } else {
    // Contraseña incorrecta
    echo '
            <script>
                alert("Contraseña incorrecta, verifique los datos introducidos");
                window.location = "../login.php";
            </script>
        ';
    exit;
  }
} else {
  // El email no existe
  echo '
        <script>
            alert("El usuario no existe, por favor verifique los datos introducidos");
            window.location = "../login.php";
        </script>
    ';
  exit;
}
