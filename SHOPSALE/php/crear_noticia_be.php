<?php
session_start();
include '../includes/conexion.php';

if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../index.php");
    exit;
}

$titulo = mysqli_real_escape_string($con, $_POST['titulo']);
$texto_novedad = mysqli_real_escape_string($con, $_POST['texto_novedad']);
$fecha_desde = $_POST['fecha_desde'];
$fecha_hasta = $_POST['fecha_hasta'];
$categoria_destino = $_POST['categoria_destino'];

if ($fecha_desde > $fecha_hasta) {
    echo '<script>alert("La fecha de inicio no puede ser mayor a la de fin."); window.history.back();</script>';
    exit;
}

$sql = "INSERT INTO novedades (titulo, texto_novedad, fecha_desde, fecha_hasta, categoria_destino) 
        VALUES ('$titulo', '$texto_novedad', '$fecha_desde', '$fecha_hasta', '$categoria_destino')";

if(mysqli_query($con, $sql)) {
    echo '<script>alert("¡Noticia publicada correctamente!"); window.location = "../noticias.php";</script>';
} else {
    echo '<script>alert("Error al publicar."); window.history.back();</script>';
}
?>