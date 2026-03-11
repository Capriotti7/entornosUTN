<?php
session_start();
include '../includes/conexion.php';

// Verificar admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
  header("location: ../index.php");
  exit;
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $imagen = $_GET['imagen'];

  $query = "DELETE FROM locales WHERE id = $id";
  $ejecutar = mysqli_query($con, $query);

  if ($ejecutar) {

    $ruta_imagen = "../assets/img/locales/" . $imagen;
    if (file_exists($ruta_imagen)) {
      unlink($ruta_imagen); 
    }

    header("location: ../locales.php?msg=eliminado");
  } else {
    echo "Error al borrar: " . mysqli_error($con);
  }
}
