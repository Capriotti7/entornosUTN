<?php
// Datos de configuración de XAMPP por defecto
$servidor = "localhost";
$usuario_db = "root"; // Usuario por defecto de XAMPP
$password_db = "";    // Contraseña vacía por defecto en XAMPP
$nombre_db = "shopsale_db";
$puerto = 3307;

// Crear conexión
$con = new mysqli($servidor, $usuario_db, $password_db, $nombre_db, $puerto);

// Verificar si hubo error
if ($con->connect_error) {
  die("Fallo en la conexión: " . $con->connect_error);
}

// Establecer codificación de caracteres a UTF-8 (para tildes y ñ)
$con->set_charset("utf8");