<?php
session_start();

include '../includes/conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];

$validar_login = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email'");

if (mysqli_num_rows($validar_login) > 0) {

  $usuario = mysqli_fetch_assoc($validar_login);

  if (password_verify($password, $usuario['password'])) {

    // Guardamos variables de sesión para usarlas en todo el sitio
    $_SESSION['usuario'] = $email;
    $_SESSION['nombre_usuario'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    header("location: ../index.php");
    exit;
  } else {
    echo '
            <script>
                alert("Contraseña incorrecta, verifique los datos introducidos");
                window.location = "../login.php";
            </script>
        ';
    exit;
  }
} else {
  echo '
        <script>
            alert("El usuario no existe, por favor verifique los datos introducidos");
            window.location = "../login.php";
        </script>
    ';
  exit;
}
